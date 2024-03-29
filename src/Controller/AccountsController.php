<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Businesses Controller
 *
 * @property \App\Model\Table\BusinessesTable $Businesses
 *
 * @method \App\Model\Entity\Business[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class AccountsController extends AppController
{

    /**
     * @param null $user
     * @return bool
     */
    public function isAuthorized($user = null)
    {
        return true; // True by default to allow all for development TODO: SET UP AUTHORIZATION FOR THIS CONTROLLER
    }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $businessesTable = $this->Businesses->find('all', [
            'contain' => ['Users']
        ]);
        $businesses = $this->paginate($businessesTable);
        foreach ($businesses as $business) {
            foreach ($business->users as $user) {
                if ($user->role === 2) {
                    $business->owner = $user;
                }
            }
        }

        $this->set(compact('businesses'));
    }

    /**
     * View method
     *
     * @param string|null $id Business id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $business = $this->Businesses->get($id, [
            'contain' => ['Users'],
        ]);
        $userRoles = $this->userRoles;

        $this->set(compact('business', 'userRoles'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $business = $this->Businesses->newEntity();
        if ($this->request->is('post')) {
            $business = $this->Businesses->patchEntity($business, $this->request->getData());
            if ($this->Businesses->save($business)) {
                $this->Flash->success(__('The business has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The business could not be saved. Please, try again.'));
        }
        $this->set(compact('business'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Business id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $business = $this->Businesses->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $business = $this->Businesses->patchEntity($business, $this->request->getData());
            if ($this->Businesses->save($business)) {
                $this->Flash->success(__('The business has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The business could not be saved. Please, try again.'));
        }
        $this->set(compact('business'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Business id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $business = $this->Businesses->get($id);
        if ($this->Businesses->delete($business)) {
            $this->Flash->success(__('The business has been deleted.'));
        } else {
            $this->Flash->error(__('The business could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    /**
     * View method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function viewUser($id = null)
    {
        $this->loadModel('Users');
        $user = $this->Users->get($id, [
            'contain' => ['Businesses', 'Batches', 'GrowthProfiles', 'Notes', 'Plants', 'Reports'],
        ]);
        $userRoles = $this->userRoles;

        $this->set(compact('user', 'userRoles'));
    }
}
