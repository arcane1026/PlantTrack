<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Mailer\Transport\SmtpTransport;
use Cake\Mailer\Email;
use Cake\Routing\Router;

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
        $this->Auth->allow(['logout', 'login', 'register', 'confirmEmail', 'resendActivationEmail']);
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

    /**
     * Dashboard method
     */
    public function dashboard()
    {

    }

    /**
     * Login method
     *
     * @return \Cake\Http\Response|null
     */
    public function login()
    {
        $this->layout = 'login';

        if ($this->request->is('post')) {
            $this->loadModel('AccessLog');
            $formData = $this->request->getData();
            $recentAccessAttempts = $this->AccessLog->find('all', ['conditions' => [
                'AccessLog.created >=' => date('Y-m-d H:i:s', strtotime('-30 minutes'))]]
            )->where(['username' => $formData['username'], 'result' => false])->count();
            if ($recentAccessAttempts < 11) {
                $logEntity = $this->AccessLog->NewEntity();
                $logEntity->username = $formData['username'];
                $logEntity->ipAddress = $this->request->clientIp();
                $user = $this->Auth->identify();
                //var_dump($user);
                if ($user) { // Check that user exists after checking username and password
                    $logEntity->result = 1;
                    if ($user['confirmed'] === true) { // Check that user has confirmed their email address
                        $this->Auth->setUser($user); // Sign user in
                        $this->AccessLog->save($logEntity);
                        return $this->redirect($this->Auth->redirectUrl());
                    } else {
                        $resendURL = Router::url(['controller' => 'Users', 'action' => 'resend-activation-email']) . '/' . base64_encode($user['email']);
                        $this->Flash->error('You must confirm your email address. <a href="' . $resendURL . '">Click Here</a> to resend the confirmation email.', ['escape' => false]);
                    }
                } else {
                    $logEntity->password = $formData['password'];
                    $logEntity->result = 0;
                    $msg = 'Your username or password is incorrect.';
                    if ($recentAccessAttempts > 5) {
                        $msg .= ' You have ' . (11 - $recentAccessAttempts) . ' attempt(s) remaining before being locked out.';
                    }
                    $this->Flash->error($msg);
                }
                $this->AccessLog->save($logEntity);
            } else {
                // Too many access attempts
                $this->Flash->error('You have exceeded the maximum allowable number of access attempts and this account is now temporarily locked.');
            }
        }
    }

    /**
     * Logout method
     *
     * @return \Cake\Http\Response|null
     */
    public function logout()
    {
        $this->Flash->success('You are now logged out.');
        return $this->redirect($this->Auth->logout());
    }

    /**
     * Register method
     *
     * @return \Cake\Http\Response|null
     */
    public function register()
    {
        $this->viewBuilder()->setLayout('login'); // Set layout to login
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
                            $this->sendActivationEmail($user);
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

    /**
     * Confirm email method
     * URL that user goes to to confirm their email address
     *
     * @param null $encryptedEmail
     * @param null $accountIdHash
     * @return \Cake\Http\Response|null
     */
    public function confirmEmail($encryptedEmail = null, $accountIdHash = null)
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

    /**
     * Resend activation email
     *
     * @param null $email
     * @return \Cake\Http\Response|null
     */
    public function resendActivationEmail($email = null)
    {
        if (!empty($email)) {
            $user = $this->Users->find('all')->where(['email' => base64_decode($email)])->first();
            $this->sendActivationEmail($user);
            $this->Flash->success(__('Confirmation email sent.')); // Notify the user
        } else {
            $this->Flash->error(__('Unable to send confirmation email.'));
        }
        return $this->redirect(['action' => 'login']); // Redirect user to login page
        $this->view = 'login'; // TODO: REMOVE FOR PRODUCTION
        $this->layout = 'login'; // TODO: REMOVE FOR PRODUCTION
    }

    /**
     * Change Password
     * Allows a user to change their password
     *
     * @return \Cake\Http\Response|null
     */
    public function changePassword() {
        if ($this->request->is('post')) { // Check if request is post
            $data = $this->request->getData(); // Get data from post
            if ($data['new-password'] === $data['repeat-new-password']) { // Check if new password and repeat new password match
                $user = $this->Users->get($this->Auth->User('id')); // Get the current user object from the database
                $data['password'] = $data['new-password']; // Set the current password equal to the new password in the form data
                $data = array_intersect_key( $data, array_flip( ['password'] ) ); // Remove all elements from data array except the new password that is now stored in 'password' key
                $user = $this->Users->patchEntity($user, $data); // Patch user entity with new password
                if ($this->Users->save($user)) { // If saving user to DB was successful
                    $this->Flash->success(__('Your password has been changed.')); // Message success!
                    return $this->redirect(['action' => 'dashboard']); // Redirect user to dashboard with success message.
                }
                $this->Flash->error(__('Error saving new password.')); // Generate error message
            } else {
                $this->Flash->error(__('New Password and Repeat New Password fields must match.')); // Generate error message
            }
        }
        $user = $this->Users->newEntity(); // Create empty user for view
        $this->set(compact('user')); // Send user data to the view
    }

    /**
     * Promote
     * Allows a user to be promoted from employee to manager
     *
     * @param null $id
     * @return \Cake\Http\Response|null
     */
    public function promote($id = null) {
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->get($id);
            if ($user->role === 0) {
                $user->role = 1;
                if ($this->Users->save($user)) {
                    $this->Flash->success(__('The user has been promoted to manager.'));
                } else {
                    $this->Flash->error(__('Error saving user.'));
                }
            } else {
                $this->Flash->error(__('This user cannot be promoted this way.'));
            }
        }
        return $this->redirect(['action' => 'index']);
    }

    /**
     * Demote
     * Allows a user to be demoted from manager to employee
     *
     * @param null $id
     * @return \Cake\Http\Response|null
     */
    public function demote($id = null)
    {
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->get($id);
            if ($user->role === 1) {
                $user->role = 0;
                if ($this->Users->save($user)) {
                    $this->Flash->success(__('The user has been demoted to employee.'));
                } else {
                    $this->Flash->error(__('The user could not be saved. Please, try again.'));
                }
            } else {
                $this->Flash->error(__('This user cannot be demoted this way.'));
            }
        }
        return $this->redirect(['action' => 'index']);
    }
    public function changeOwner() {
        if ($this->request->is('post')) {
            if ($this->Auth->User('role') === 2) { // Must be owner
                $user = $this->Auth->identify(); // Check username/password combo
                if ($user) {
                    $currentOwner = $this->Users->get($this->Auth->User('id'));
                    $currentOwner->role = 1;
                    $newOwner = $this->Users->get($this->request->getData('new-owner'));
                    $newOwner->role = 2;
                    if ($this->Users->save($currentOwner) && $this->Users->save($newOwner)) { // If saving user to DB was successful
                        $this->sendNewOwnerNotificationEmails($currentOwner, $newOwner);
                        $this->Flash->success(__('Owner change successful.'));
                        return $this->redirect(['action' => 'logout']); // Redirect user to dashboard with success message.
                    }
                    $this->Flash->error(__('Error saving new owner.'));
                } else {
                    $this->Flash->error(__('Username or password is incorrect'));
                }
            } else {
                $this->Flash->error(__('Only the current owner can change ownership.'));
            }
        }
        $users = $this->Users->find('list', ['keyField' => 'id', 'valueField' => 'username'])->where(['business_id' => $this->Auth->User('business_id')])->where(['NOT' => ['id' => $this->Auth->User('id')]]);
        $this->set(compact('users'));
    }

    /**
     * Sends activation email to the specified user.
     *
     * @param $user
     */
    private function sendActivationEmail($user) {
        $activateURL = $url = Router::url(['controller' => 'Users', 'action' => 'confirm-email'], ['_full' => true]) . '/' . base64_encode($user['email']) . '/' . sha1($user['id'] . $user['email']);
        $email = new Email('default'); // Create a new email using default email profile (set in app.php)
        $email->setFrom(['admin@planttrackapp.com' => 'Plant Track']) // Set from address
        ->setTo($user['email']) // Set to address
        ->setSubject('Welcome to PlantTrack!') // Set subject
        ->setTemplate('owner-register') // Choose while file to send
        ->setEmailFormat('both') // Send both text and HTML variants
        ->viewVars([ // Pass variables to the template
            'first_name' => $user['first_name'],
            'last_name' => $user['last_name'],
            'confirmation_url' => $activateURL
        ])
            ->send(); // Send the email
    }

    /**
     * Sends activation email to the specified user.
     *
     * @param $user
     */
    private function sendNewOwnerNotificationEmails($oldOwner, $newOwner) {
        // Email to send notification of ownership transfer to old owner and new owner
        $email = new Email('default'); // Create a new email using default email profile (set in app.php)
        $email->setFrom(['admin@planttrackapp.com' => 'Plant Track']) // Set from address
        ->setTo($oldOwner->email) // Set to address
        ->addTo($newOwner->email) // Add another to address
        ->setSubject('Important Notice! Account ownership transferred.') // Set subject
        ->setTemplate('new-owner-notification') // Choose while file to send
        ->setEmailFormat('both') // Send both text and HTML variants
        ->viewVars([ // Pass variables to the template
            'old_owner_first_name' => $oldOwner->first_name,
            'old_owner_last_name' => $oldOwner->last_name,
            'old_owner_username' => $oldOwner->username,
            'new_owner_first_name' => $newOwner->first_name,
            'new_owner_last_name' => $newOwner->last_name,
            'new_owner_username' => $newOwner->username
        ])
            ->send(); // Send the email
    }
}
