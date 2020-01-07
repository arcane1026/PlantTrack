<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * GrowthProfiles Controller
 *
 * @property \App\Model\Table\GrowthProfilesTable $GrowthProfiles
 *
 * @method \App\Model\Entity\GrowthProfile[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class GrowthProfilesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Users', 'Plants'],
        ];
        $growthProfiles = $this->paginate($this->GrowthProfiles);

        $this->set(compact('growthProfiles'));
    }

    /**
     * View method
     *
     * @param string|null $id Growth Profile id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $growthProfile = $this->GrowthProfiles->get($id, [
            'contain' => ['Users', 'Plants', 'Batches', 'Stages'],
        ]);

        $this->set('growthProfile', $growthProfile);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $growthProfile = $this->GrowthProfiles->newEntity();
        if ($this->request->is('post')) {
            $growthProfile = $this->GrowthProfiles->patchEntity($growthProfile, $this->request->getData());
            if ($this->GrowthProfiles->save($growthProfile)) {
                $this->Flash->success(__('The growth profile has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The growth profile could not be saved. Please, try again.'));
        }
        $users = $this->GrowthProfiles->Users->find('list', ['limit' => 200]);
        $plants = $this->GrowthProfiles->Plants->find('list', ['limit' => 200]);
        $this->set(compact('growthProfile', 'users', 'plants'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Growth Profile id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $growthProfile = $this->GrowthProfiles->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $growthProfile = $this->GrowthProfiles->patchEntity($growthProfile, $this->request->getData());
            if ($this->GrowthProfiles->save($growthProfile)) {
                $this->Flash->success(__('The growth profile has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The growth profile could not be saved. Please, try again.'));
        }
        $users = $this->GrowthProfiles->Users->find('list', ['limit' => 200]);
        $plants = $this->GrowthProfiles->Plants->find('list', ['limit' => 200]);
        $this->set(compact('growthProfile', 'users', 'plants'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Growth Profile id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $growthProfile = $this->GrowthProfiles->get($id);
        if ($this->GrowthProfiles->delete($growthProfile)) {
            $this->Flash->success(__('The growth profile has been deleted.'));
        } else {
            $this->Flash->error(__('The growth profile could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
