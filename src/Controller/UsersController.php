<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Mailer\Transport\SmtpTransport;
use Cake\Mailer\Email;
use Cake\Routing\Router;
use Cake\Validation\Validator;

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
        $this->Auth->allow(['logout', 'login', 'register', 'confirmEmail', 'resendActivationEmail', 'debugGenUsers']); // Public actions that don't require authentication.
    }

    /**
     * @param null $user
     * @return bool
     */
    public function isAuthorized($user = null)
    {
        switch($this->request->getParam('action')) { // Switch on the requested action
            case 'promote':
            case 'demote':
            case 'changeOwner':
            case 'inviteUser':
            case 'manage':
                return (bool)($user['role'] === 2); // If user is owner return true, else false
                break;
            case 'index': // TODO: Remove for production
            case 'add': // TODO: Remove for production
            case 'edit': // TODO: Remove for production
            case 'view': // TODO: Remove for production
            case 'delete': // TODO: Remove for production
            case 'viewProfile':
            case 'editProfile':
            case 'changePassword':
                return true;
            default:
                return false; // Return false by default for any unspecified methods
        }
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
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function manage()
    {
        $this->paginate = [
            'contain' => ['Businesses'],
        ];
        $employees = $this->paginate($this->Users->find('all', [
            'contain' => ['Businesses'],
        ])->where(['business_id' => $this->Auth->User('business_id'), 'role' => 0]));
        $managers = $this->paginate($this->Users->find('all', [
            'contain' => ['Businesses'],
        ])->where(['business_id' => $this->Auth->User('business_id'), 'role' => 1]));

        $userRoles = $this->userRoles;
        $this->set(compact('employees', 'managers', 'userRoles'));

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
     * View method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function viewProfile()
    {
        $user = $this->Users->get($this->Auth->User('id'), [
            'contain' => ['Businesses', 'Batches', 'GrowthProfiles', 'Notes', 'Plants', 'Reports'],
        ]);
        $userRoles = $this->userRoles;

        $this->set(compact('user', 'userRoles'));
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
     * Edit method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function editProfile()
    {
        $user = $this->Users->get($this->Auth->User('id'), [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('Your profile has been saved.'));

                return $this->redirect(['action' => 'view-profile']);
            }
            $this->Flash->error(__('There was an error saving your profile. Please, try again.'));
        }
        $this->set(compact('user'));
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
                $logEntity->ip_address = $this->request->clientIp();
                $user = $this->Auth->identify();
                //var_dump($logEntity);
                if ($user) { // Check that user exists after checking username and password
                    $logEntity->result = 1;
                    if ($user['confirmed'] === true) { // Check that user has confirmed their email address
                        $this->Auth->setUser($user); // Sign user in
                        $this->AccessLog->save($logEntity);
                        //var_dump($logEntity->errors());
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
            if (isset($data['step1'])) { // Business Form Submitted
                $validator = new Validator();
                $validator
                    ->requirePresence('authorized', 'You must certify that you are an authorized representative of this business.')
                    ->equals('authorized', 1, 'You must certify that you are an authorized representative of this business.');
                $business = $this->Users->Businesses->newEntity(); // Create a new business
                $business = $this->Users->Businesses->patchEntity($business, $data); // Fill the business with form data
                $errors = $business->errors();
                $valErrors = $validator->errors($this->request->getData());
                if (!empty($errors) && !empty($valErrors)) {
                    $errors = array_merge($errors, $valErrors);
                } else if (!empty($valErrors) && empty($errors)) {
                    $errors = $valErrors;
                }
                if (!empty($errors)) { // If there are validation errors
                    $this->set(compact('business', 'errors')); // Send business data and errors to view
                } else { // Step 2 Button Click Success!
                    $session = $this->getRequest()->getSession(); // Get session
                    $session->write('business', $business); // Write business data to session
                    $this->view = 'register-2'; // Set form to step 2
                    $user = $this->Users->newEntity(); // Create an empty user
                    $this->set(compact('user')); // Send empty user to view
                }
            } else { // User Form Submitted
                $validator = new Validator();
                $validator
                    ->requirePresence('repeat_password')
                    ->notEmptyString('repeat_password', 'Repeat Password is required.')
                    ->equalToField('password', 'repeat_password', 'Password and Repeat Password must match.')
                    ->requirePresence('agreement', 'You must agree to the terms and conditions.')
                    ->equals('agreement', 1, 'You must agree to the terms and conditions.');
                $data['role'] = '2'; // Set role to owner manually in form data
                $user = $this->Users->newEntity(); // Create a new empty user
                $user = $this->Users->patchEntity($user, $data); // Fill the user with form data
                $errors = $user->errors();
                $valErrors = $validator->errors($this->request->getData());
                if (!empty($errors) && !empty($valErrors)) {
                    $errors = array_merge($errors, $valErrors);
                } else if (!empty($valErrors) && empty($errors)) {
                    $errors = $valErrors;
                }
                if (!empty($errors)) { // If there are validation errors
                    $this->set(compact('user', 'errors')); // Send Errors and User data to view
                    $this->view = 'register-2'; // Set form to step 1
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
        $user = $this->Users->get($id);
        if ($user->role === 0 && $user->business_id === $this->Auth->User('business_id')) {
            $user->role = 1;
            if ($this->Users->save($user)) {
                $this->Flash->success(__('User (' . $user->username . ') has been promoted to manager.'));
            } else {
                $this->Flash->error(__('Error saving user.'));
            }
        } else {
            $this->Flash->error(__('This user cannot be promoted this way.'));
        }
        return $this->redirect(['action' => 'manage']);
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
        $user = $this->Users->get($id);
        if ($user->role === 1) {
            if ($user->business_id === $this->Auth->User('business_id') || $this->Auth->User('role') === 3) {
                $user->role = 0;
                if ($this->Users->save($user)) {
                    $this->Flash->success(__('User (' . $user->username . ') has been demoted to employee.'));
                } else {
                    $this->Flash->error(__('The user could not be saved. Please, try again.'));
                }
            } else {
                $this->Flash->error(__('User must be a member of your business.'));
            }
        } else {
            $this->Flash->error(__('This user cannot be demoted this way.'));
        }
        return $this->redirect(['action' => 'manage']);
    }

    /**
     * Change Owner
     * Change the owner of the business account
     *
     * @return \Cake\Http\Response|null
     */
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
        $users = $this->Users->find('list', ['keyField' => 'id', 'valueField' => 'username'])->where(['business_id' => $this->Auth->User('business_id'), 'role' => 1], ['NOT' => ['id' => $this->Auth->User('id')]]);
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
     * Send NEw Owner Notification Emails
     * Email to send notification of ownership transfer to old owner and new owner.
     *
     * @param $user
     */
    private function sendNewOwnerNotificationEmails($oldOwner, $newOwner) {//
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



    /**
     * DEBUG METHOD ::: TODO: REMOVE THIS FOR PRODUCTION
     *
     * Generates user accounts after re-creating database
     */
    public function debugGenUsers()
    {
        $userData = [];
        $users = [];
        // Kennedy Admin User
        $userData[0] = [
            'username' => 'kennedy',
            'password' => 'kennedy',
            'role' => 3,
            'first_name' => 'Kennedy',
            'last_name' => 'Richardson',
            'email' => 'kenrich213@gmail.com',
            'phone' => '4012345678',
            'confirmed' => 1,
        ];
        // AJ Admin User
        $userData[1] = [
            'username' => 'angelo',
            'password' => 'angelo',
            'role' => 3,
            'first_name' => 'Angelo',
            'last_name' => 'Lagreca',
            'email' => 'angelolagreca3@gmail.com',
            'phone' => '4012345678',
            'confirmed' => 1,
        ];
        // Owner User
        $userData[2] = [
            'business_id' => 1,
            'username' => 'owner',
            'password' => 'owner',
            'role' => 2,
            'first_name' => 'Sally',
            'last_name' => 'Jones',
            'email' => 'kenrich213+0@gmail.com',
            'phone' => '4012345678',
            'confirmed' => 1,
        ];
        // Manager User
        $userData[3] = [
            'business_id' => 1,
            'username' => 'man1',
            'password' => 'man1',
            'role' => 1,
            'first_name' => 'Jennifer',
            'last_name' => 'Cristin',
            'email' => 'kenrich213+1@gmail.com',
            'phone' => '4012345678',
            'confirmed' => 1,
        ];
        // Manager User
        $userData[4] = [
            'business_id' => 1,
            'username' => 'man2',
            'password' => 'man2',
            'role' => 1,
            'first_name' => 'Jackie',
            'last_name' => 'Johnson',
            'email' => 'kenrich213+2@gmail.com',
            'phone' => '4012345678',
            'confirmed' => 1,
        ];
        // Employee User 1
        $userData[5] = [
            'business_id' => 1,
            'username' => 'emp1',
            'password' => 'emp1',
            'role' => 0,
            'first_name' => 'Sarah',
            'last_name' => 'Simmer',
            'email' => 'kenrich213+3@gmail.com',
            'phone' => '4012345678',
            'confirmed' => 1,
        ];
        // Emplyoee User 2
        $userData[6] = [
            'business_id' => 1,
            'username' => 'emp2',
            'password' => 'emp2',
            'role' => 0,
            'first_name' => 'Joesph',
            'last_name' => 'Picard',
            'email' => 'kenrich213+4@gmail.com',
            'phone' => '4012345678',
            'confirmed' => 1,
        ];
        // Emplyoee User 2
        $userData[7] = [
            'business_id' => 1,
            'username' => 'emp3',
            'password' => 'emp3',
            'role' => 0,
            'first_name' => 'John',
            'last_name' => 'Hendrix',
            'email' => 'kenrich213+5@gmail.com',
            'phone' => '4012345678',
            'confirmed' => 1,
        ];
        // Emplyoee User 2
        $userData[8] = [
            'business_id' => 1,
            'username' => 'emp4',
            'password' => 'emp4',
            'role' => 0,
            'first_name' => 'Jimmy',
            'last_name' => 'TwoShoes',
            'email' => 'kenrich213+6@gmail.com',
            'phone' => '4012345678',
            'confirmed' => 1,
        ];

        $biz = $this->Users->Businesses->newEntity();
        $biz = $this->Users->Businesses->patchEntity($biz, ['name' => 'AgraGrow LLC', 'street' => '11 Main St.', 'city' => 'Providence', 'state' => 'RI', 'zip' => '02020']);
        if ($this->Users->Businesses->save($biz)) {
            foreach ($userData as $userFields) {
                $user = $this->Users->newEntity();
                $user = $this->Users->patchEntity($user, $userFields);
                if (!$this->Users->save($user)) {
                    $this->Flash->error(__('The user could not be saved. Please, try again.'));
                    var_dump($user->errors());
                }
            }
        }
        return $this->redirect(['action' => 'login']);
    }
}
