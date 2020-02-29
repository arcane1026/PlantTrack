<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Plants Controller
 *
 * @property \App\Model\Table\PlantsTable $Plants
 *
 * @method \App\Model\Entity\Plant[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class PlantsController extends AppController
{
    /**
     * @param null $user
     * @return bool
     */
    public function isAuthorized($user = null)
    {
        return (bool)($user['role'] === 1 || $user['role'] === 2); // If user is owner or manager return true for all methods
    }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Users'],
        ];
        $plants = $this->paginate($this->Plants);

        $this->set(compact('plants'));
    }

    /**
     * View method
     *
     * @param string|null $id Plant id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $plant = $this->Plants->get($id, [
            'contain' => ['Users', 'Batches', 'GrowthProfiles'],
        ]);

        $this->set('plant', $plant);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $plant = $this->Plants->newEntity();
        if ($this->request->is('post')) {
            $data = $this->request->getData();
            $data['user_id'] = $this->Auth->User('id');
            $plant = $this->Plants->patchEntity($plant, $data);
            $plant->business_id = $this->Auth->User('business_id');
            if ($this->Plants->save($plant)) {
                $this->Flash->success(__('The plant has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The plant could not be saved. Please, try again.'));
        }
        $users = $this->Plants->Users->find('list', ['limit' => 200]);
        $this->set(compact('plant', 'users'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Plant id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $plant = $this->Plants->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $plant = $this->Plants->patchEntity($plant, $this->request->getData());
            if ($this->Plants->save($plant)) {
                $this->Flash->success(__('The plant has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The plant could not be saved. Please, try again.'));
        }
        $users = $this->Plants->Users->find('list', ['limit' => 200]);
        $this->set(compact('plant', 'users'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Plant id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $plant = $this->Plants->get($id);
        if ($this->Plants->delete($plant)) {
            $this->Flash->success(__('The plant has been deleted.'));
        } else {
            $this->Flash->error(__('The plant could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
