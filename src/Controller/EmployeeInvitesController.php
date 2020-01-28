<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Mailer\Email;
use Cake\Routing\Router;

/**
 * EmployeeInvites Controller
 *
 * @property \App\Model\Table\EmployeeInvitesTable $EmployeeInvites
 *
 * @method \App\Model\Entity\EmployeeInvite[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class EmployeeInvitesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $employeeInvites = $this->paginate($this->EmployeeInvites);

        $this->set(compact('employeeInvites'));
    }

    /**
     * View method
     *
     * @param string|null $id Employee Invite id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $employeeInvite = $this->EmployeeInvites->get($id, [
            'contain' => [],
        ]);

        $this->set('employeeInvite', $employeeInvite);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
{
    $employeeInvite = $this->EmployeeInvites->newEntity();
    if ($this->request->is('post')) {
        $employeeInvite = $this->EmployeeInvites->patchEntity($employeeInvite, $this->request->getData());
        if ($this->EmployeeInvites->save($employeeInvite)) {
            $this->Flash->success(__('The employee invite has been saved.'));

            return $this->redirect(['action' => 'index']);
        }
        $this->Flash->error(__('The employee invite could not be saved. Please, try again.'));
    }
    $this->set(compact('employeeInvite'));
}

    /**
     * Edit method
     *
     * @param string|null $id Employee Invite id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $employeeInvite = $this->EmployeeInvites->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $employeeInvite = $this->EmployeeInvites->patchEntity($employeeInvite, $this->request->getData());
            if ($this->EmployeeInvites->save($employeeInvite)) {
                $this->Flash->success(__('The employee invite has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The employee invite could not be saved. Please, try again.'));
        }
        $this->set(compact('employeeInvite'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Employee Invite id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $employeeInvite = $this->EmployeeInvites->get($id);
        if ($this->EmployeeInvites->delete($employeeInvite)) {
            $this->Flash->success(__('The employee invite has been deleted.'));
        } else {
            $this->Flash->error(__('The employee invite could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function inviteEmployee()//function for owner to invite employee
    {
        $invitation = $this->EmployeeInvites->newEntity();//rename invite variable to not conflict with existing add
        if ($this->request->is('post')) {
            $invitation = $this->EmployeeInvites->patchEntity($invitation, $this->request->getData());
            if ($this->EmployeeInvites->save($invitation)) {
                $this->Flash->success(__('The employee invite has been saved.'));

                $this->sendEmployeeInvite($invitation);

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The employee invite could not be saved. Please, try again.'));
        }
        $this->set(compact('invitation'));
    }

    private function sendEmployeeInvite($invitation) {
        $activateURL = $url = Router::url(['controller' => 'Employee_Invites', 'action' => 'confirm-employee-email'], ['_full' => true]) . '/' . base64_encode($invitation['email']) . '/' . sha1($invitation['id'] . $invitation['email']);
        $email = new Email('default'); // Create a new email using default email profile (set in app.config)
        $email->setFrom(['admin@planttrackapp.com' => 'Plant Track']) // Set from address
        ->setTo($invitation['email']) // Set to address
        ->setSubject('Please Confirm Your PlantTrack Employee Account!') // Set subject
        ->setTemplate('employee-register') // Choose while file to send!CHANGE
        ->setEmailFormat('both') // Send both text and HTML variants
        ->viewVars([ // Pass variables to the template
            'first_name' => $invitation['first_name'],
            'last_name' => $invitation['last_name'],
            'confirmation_url' => $activateURL
        ])
            ->send(); // Send the email


    }

    public function confirmEmployeeEmail($encryptedEmail = null, $accountIdHash = null)
    {
        $user = $this->Users->find('all')->where(['email' => base64_decode($encryptedEmail)])->first(); // Find the first user who's email matches the decoded email address
        if (sha1($user['id'] . $user['email']) === $accountIdHash) { // Check if the hash matches the sha1 of the user id and user's email address.
            $user['confirmed'] = 1; // Update the user's confirmed value to true
            $this->Users->save($user); // Save the user
            $this->Flash->success(__('Your email address has been confirmed. You are now able to sign in.')); // Notify the user
        } else {
            $this->Flash->error(__('Sorry we were unable to confirm your email address. Please contact support for further assistance.'));
        }
        return $this->redirect(['action' => 'login']); // Redirect user to login page
        $this->layout = 'login'; // TODO: REMOVE FOR PRODUCTION
        $this->view = 'login'; // TODO: REMOVE FOR PRODUCTION
    }
}
