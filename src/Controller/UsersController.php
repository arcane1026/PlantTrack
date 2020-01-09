<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Mailer\Email;
use Cake\Mailer\Transport\SmtpTransport;

/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 *
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class UsersController extends AppController
{
    public function initialize()
    {
        parent::initialize();
        $this->Auth->allow(['logout', 'login', 'register']);
        //$this->loadComponent('Email');
    }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Businesses'],
        ];
        $users = $this->paginate($this->Users);

        $this->set(compact('users'));
    }

    /**
     * View method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => ['Businesses', 'Batches', 'GrowthProfiles', 'Notes', 'Plants', 'Reports'],
        ]);

        $this->set('user', $user);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $user = $this->Users->newEntity();
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $businesses = $this->Users->Businesses->find('list', ['limit' => 200]);
        $this->set(compact('user', 'businesses'));
    }

    /**
     * Edit method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $businesses = $this->Users->Businesses->find('list', ['limit' => 200]);
        $this->set(compact('user', 'businesses'));
    }

    /**
     * Delete method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $user = $this->Users->get($id);
        if ($this->Users->delete($user)) {
            $this->Flash->success(__('The user has been deleted.'));
        } else {
            $this->Flash->error(__('The user could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function login()
    {
        $this->layout = 'login';

        if ($this->request->is('post')) {
            $user = $this->Auth->identify();
            if ($user) {
                $this->Auth->setUser($user);
                return $this->redirect($this->Auth->redirectUrl());
            }
            $this->Flash->error('Your username or password is incorrect.');
        }
    }

    public function register()
    {
        $this->layout = 'login'; // Set layout to login
        if ($this->request->is('post')) { // Check if is post request
            $data = $this->request->getData(); // Get form data
            if (empty($data)) { // If no form data, step 1 button click
                $this->view = 'register-step-2'; // Step 1 button click, need step 2 view
            } else {
                if (isset($data['city'])) { // If city field was submitted, step 2 button click TODO: Maybe a better way to determine this step?!?
                    $business = $this->Users->Businesses->newEntity(); // Create a new business
                    $business = $this->Users->Businesses->patchEntity($business, $data); // Fill the business with form data
                    if ($errors = $business->errors()) { // If there are validation errors
                        $this->view = 'register-step-2'; // Set form to step 2
                        $this->set(compact('business', 'errors')); // Send business data and errors to view
                    } else { // Step 2 Button Click Success!
                        $session = $this->getRequest()->getSession(); // Get session
                        $session->write('business', $business); // Write business data to session
                        $this->view = 'register-step-3'; // Set form to step 3
                        $user = $this->Users->newEntity(); // Create an empty user
                        $this->set(compact('user')); // Send empty user to view
                    }
                } else { // Step 3 button click
                    $data['role'] = '2'; // Set role to owner manually in form data
                    $user = $this->Users->newEntity(); // Create a new empty user
                    $user = $this->Users->patchEntity($user, $data); // Fill the user with form data
                    if ($errors = $user->errors()) { // If there are validation errors
                        $this->set(compact('user', 'errors')); // Send Errors and User data to view
                        $this->view = 'register-step-3'; // Set form to step 3
                    } else {
                        $session = $this->getRequest()->getSession(); // Get session
                        $businessData = $session->read('business'); // Read business from session
                        $user = $this->Users->newEntity(); // Create a new user
                        $user = $this->Users->patchEntity($user, $data); // Fill user with form data
                        $user['business'] = $businessData; // Add business from session to user
                        if ($this->Users->save($user)) { // If the user and business saved properly
                            $this->Email = new Email('default'); // Create a new email
                            /*$email->setFrom(['admin@planttrackapp.com' => 'Plant Track']) // Set email from address
                                ->setTo($user['email'])
                                ->setSubject('Welcome to PlantTrack!')
                                ->send('Hi ' . $user['first_name'] . ' ' . $user['last_name'] . ',\n' .
                                                '\n' .
                                                'Congratulations on your new PlantTrack account! Please click this link to confirm your email address: <a href="' . $_SERVER['HTTP_HOST'] . '/confirm-email/' . sha1($user['id'] . '' . $user['created']) . '">Confirmation Link</a>');
                            */
                            /*
                            //$this->Email-> delivery = 'smtp';
                            $this->Email->setTransport(new SmtpTransport());
                            $this->Email->setFrom('Plant Track ');
                            $this->Email->setTo ($user['email']);
                            //$this->set('name', $user['email']);
                            $this->Email->setSubject('Welcome to PlantTrack!');
                            $this->Email->viewBuilder()->setTemplate('registration');
                            $this->Email->setEmailFormat('both');
                            $this->Email->send();
                            */
                            $this->Flash->success(__('Your account has been created but you need to confirm your email address before you can sign in. Please check your email for further instructions.')); // Success message
                            $session->delete('business'); // Delete business from session now that its saved in database
                            return $this->redirect(['action' => 'login']); // Redirect user to login page
                        }
                        $this->view = 'register-step-3'; // Set view to step 3
                        $this->set(compact('user', 'errors')); // Save user and error data to view
                    }
                }
            }
        }
    }

    public function logout()
    {
        $this->Flash->success('You are now logged out.');
        return $this->redirect($this->Auth->logout());
    }

    public function dashboard()
    {

    }
}
