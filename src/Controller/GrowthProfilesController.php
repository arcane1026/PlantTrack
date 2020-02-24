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
            'contain' => ['Users', 'Plants', 'Batches', 'Stages.Steps'],
        ]);

        $this->set(compact('growthProfile'));
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
        $plants = $this->GrowthProfiles->Plants->find('list', ['limit' => 200]);
        $this->set(compact('growthProfile', 'plants'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function addStep($id = null)
    {
        $step = $this->GrowthProfiles->Stages->Steps->newEntity();
        $stage = $this->GrowthProfiles->Stages->get($id, [
            'contain' => ['GrowthProfiles']
        ]);
        if ($this->request->is('post')) {
            $step = $this->GrowthProfiles->Stages->Steps->patchEntity($step, $this->request->getData());
            $step->stage_id = $id;
            if ($this->GrowthProfiles->Stages->Steps->save($step)) {
                $this->Flash->success(__('The step has been saved.'));

                return $this->redirect(['action' => 'edit', $stage->growth_profile_id]);
            }
            $this->Flash->error(__('The step could not be saved. Please, try again.'));
        }
        $this->set(compact('step', 'stage'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function addStage($id = null)
    {
        $stage = $this->GrowthProfiles->Stages->newEntity();
        $growthProfile = $this->GrowthProfiles->get($id);
        if ($this->request->is('post')) {
            $stage = $this->GrowthProfiles->Stages->patchEntity($stage, $this->request->getData());
            $stage->growth_profile_id = $id;
            if ($this->GrowthProfiles->Stages->save($stage)) {
                $this->Flash->success(__('The step has been saved.'));

                return $this->redirect(['action' => 'view', $stage->growth_profile_id]);
            }
            $this->Flash->error(__('The step could not be saved. Please, try again.'));
        }
        $this->set(compact('growthProfile', 'stage'));
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
            'contain' => ['Users', 'Plants', 'Batches', 'Stages.Steps'],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $data = $this->request->getData();
            var_dump($data);
            $growthProfile = $this->GrowthProfiles->patchEntity($growthProfile, $data);
            if ($this->GrowthProfiles->save($growthProfile)) {
                $this->Flash->success(__('The growth profile has been saved.'));
                return $this->redirect(['action' => 'view', $id]);
            }
            $this->Flash->error(__('The growth profile could not be saved. Please, try again.'));
        }
        $plants = $this->GrowthProfiles->Plants->find('list', ['limit' => 200]);
        $this->set(compact('growthProfile', 'plants'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Step id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function editStep($id = null)
    {
        $step = $this->GrowthProfiles->Stages->Steps->get($id, [
            'contain' => ['Stages.GrowthProfiles'],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $step = $this->GrowthProfiles->Stages->Steps->patchEntity($step, $this->request->getData());
            if ($this->GrowthProfiles->Stages->Steps->save($step)) {
                $this->Flash->success(__('The step has been saved.'));

                return $this->redirect(['action' => 'view', $step->stage->growth_profile_id]);
            }
            $this->Flash->error(__('The step could not be saved. Please, try again.'));
        }
        $this->set(compact('step'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Step id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function editStage($id = null)
    {
        $stage = $this->GrowthProfiles->Stages->get($id, [
            'contain' => ['GrowthProfiles'],
        ]);

        if ($this->request->is(['patch', 'post', 'put'])) {
            $stage = $this->GrowthProfiles->Stages->patchEntity($stage, $this->request->getData());
            if ($this->GrowthProfiles->Stages->save($stage)) {
                $this->Flash->success(__('The step has been saved.'));

                return $this->redirect(['action' => 'view', $stage->growth_profile_id]);
            }
            $this->Flash->error(__('The step could not be saved. Please, try again.'));
        }
        $this->set(compact('stage'));
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

    /**
     * Delete method
     *
     * @param string|null $id Step id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function deleteStep($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $step = $this->GrowthProfiles->Stages->Steps->get($id,[
            'contain' => ['Stages.GrowthProfiles']
        ]);
        $gpId = $step->stage->growth_profile_id;
        if ($this->GrowthProfiles->Stages->Steps->delete($step)) {
            $this->Flash->success(__('The step has been deleted.'));
        } else {
            $this->Flash->error(__('The step could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'view', $gpId]);
    }

    /**
     * Delete method
     *
     * @param string|null $id Step id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function deleteStage($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $stage = $this->GrowthProfiles->Stages->get($id,[
            'contain' => ['GrowthProfiles', 'Steps']
        ]);
        $gpId = $stage->growth_profile_id;
        if ($this->GrowthProfiles->Stages->delete($stage)) {
            $this->Flash->success(__('The step has been deleted.'));
        } else {
            $this->Flash->error(__('The step could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'view', $gpId]);
    }
}
