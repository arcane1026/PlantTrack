<?php
namespace App\Controller;

use Cake\Routing\Router;
use App\Controller\AppController;
use Cake\Log\Log;

/**
 * Batches Controller
 *
 * @property \App\Model\Table\BatchesTable $Batches
 *
 * @method \App\Model\Entity\Batch[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class BatchesController extends AppController
{
    /**
     * @param null $user
     * @return bool
     */
    public function isAuthorized($user = null)
    {
        switch($this->request->getParam('action')) { // Switch on the requested action
            case 'delete':
            case 'edit':
                return (bool)($user['role'] === 2 || $user['role'] === 1); // If user is owner or manager return true, else false
                break;
            case 'index':
            case 'add':
            case 'view':
            case 'timeline':
            case 'plant':
            case 'nextStep':
            case 'qrCode':
            case 'addNote':
            case 'addReading':
            case 'editNote':
            case 'editReading':
            case 'deleteNote':
            case 'deleteReading':
            case 'viewNotes':
            case 'viewReadings':
            case 'setYield':
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
            'contain' => ['Users', 'GrowthProfiles', 'Plants'],
            'limit' => 5,
            'conditions' => ['Batches.business_id' => $this->Auth->User('business_id')]
        ];
        $batches = $this->paginate($this->Batches);
        $testingStatuses = $this->testingStatuses;
        $this->set(compact('batches', 'testingStatuses'));
    }

    /**
     * View method
     *
     * @param string|null $id Batch id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $batch = $this->Batches->get($id, [
            'contain' => ['Users', 'GrowthProfiles.Stages.Steps', 'Plants']
        ]);
        $notes = $this->Batches->Notes->find('all', [
            'conditions' => ['step_id' => $batch->step_id],
            'contain' => 'Users'
        ]);
        $readings = $this->Batches->Readings->find('all', [
            'conditions' => ['step_id' => $batch->step_id]
        ]);
        $stageCompleted = true;
        foreach ($batch->growth_profile->stages as $stage) {
            $stage->percent_complete = '100';
            $stage->status = 'success';
            $stepCount = 0;
            foreach ($stage->steps as $step) {
                $stepCount ++;
                if (!empty($batch->plant_date)) {
                    if ($step->id === $batch->step_id) {
                        $stage->status = 'warning';
                        $stage->percent_complete = round(($stepCount - 1) / count($stage->steps), 2) * 100;
                        $stageCompleted = false;
                        $batch->current_stage = $stage;
                        $batch->current_stage->percent_success = $stage->percent_success;
                        $batch->current_step = $step;
                        $step->status = 'warning';
                    } else if ($stageCompleted) {
                        $step->status = 'success';
                    } else {
                        $step->status = 'danger';
                    }
                } else {
                    $stage->percent_complete = '0';
                    $step->status = 'danger';
                    $stageCompleted = false;
                }

            }
            if (!$stageCompleted && $stage->status === 'success') {
                $stage->status = 'danger';
                $stage->percent_complete = '0';
            }


        }

        $stageCount = count($batch->growth_profile->stages);
        $stageColSize = (string)12/$stageCount;
        $testingStatuses = $this->testingStatuses;

        $this->set(compact('batch', 'stageColSize', 'testingStatuses', 'notes', 'readings'));
    }
    /**
     * View method
     *
     * @param string|null $id Batch id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function timeline($id = null)
    {
        $batch = $this->Batches->get($id, [
            'contain' => ['Users', 'GrowthProfiles.Stages.Steps', 'Plants']
        ]);
        $notes = $this->Batches->Notes->find('all', [
            'conditions' => ['step_id' => $batch->step_id],
            'contain' => 'Users'
        ]);
        $readings = $this->Batches->Readings->find('all', [
            'conditions' => ['step_id' => $batch->step_id]
        ]);
        $stageCompleted = true;
        foreach ($batch->growth_profile->stages as $stage) {
            $stage->status = 'success';
            $stepCount = 0;
            foreach ($stage->steps as $step) {
                $stepCount ++;
                if (!empty($batch->plant_date)) {
                    if ($step->id === $batch->step_id) {
                        $stage->status = 'warning';
                        $stage->percent_success = round(($stepCount - 1) / count($stage->steps), 2) * 100;
                        $stageCompleted = false;
                        $batch->current_stage = $stage;
                        $batch->current_stage->percent_success = $stage->percent_success;
                        $batch->current_step = $step;
                        $step->status = 'warning';
                    } else if ($stageCompleted) {
                        $stage->percent_success = '100';
                        $step->status = 'success';
                    } else {
                        $stage->percent_success = '0';
                        $step->status = 'danger';
                    }
                } else {
                    $stage->percent_success = '0';
                    $step->status = 'danger';
                    $stageCompleted = false;
                }

            }
            if (!$stageCompleted && $stage->status === 'success') {
                $stage->status = 'danger';
            }


        }
        $stageStepStatuses = $this->stageStepStatuses;
        $stageCount = count($batch->growth_profile->stages);
        $stageColSize = (string)12/$stageCount;
        $testingStatuses = $this->testingStatuses;

        $this->set(compact('batch', 'stageColSize', 'testingStatuses', 'stageStepStatuses'));
    }

    /**
     * Plant method
     *
     * @param string|null $id Batch id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function plant($id = null)
    {
        $batch = $this->Batches->get($id, [
            'contain' => ['GrowthProfiles.Stages.Steps']
        ]);
        $batch->plant_date = date('Y-m-d H:i:s');
        $batch->step_id = $batch->growth_profile->stages[0]->steps[0]->id;
        if ($this->Batches->save($batch)) {
            $this->Flash->success('Batch has been planted.');
        } else {
            $this->Flash->error('Error saving batch.');
        }
        return $this->redirect($this->referer());
    }

    /**
     * Next Step method
     *
     * @param string|null $id Batch id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function nextStep($id = null)
    {
        $batch = $this->Batches->get($id, [
            'contain' => 'GrowthProfiles.Stages.Steps'
        ]);

        $successMsg = '';

        for ($stageIndex = 0; $stageIndex<count($batch->growth_profile->stages); $stageIndex++) { // Loop through stages
            $stage = $batch->growth_profile->stages[$stageIndex]; // Set stage
            for ($stepIndex = 0; $stepIndex<count($stage->steps); $stepIndex++) { // Loop through steps
                if ($stage->steps[$stepIndex]->id === $batch->step_id && $successMsg === '') { // If this step is the current step of this batch
                    echo 'Matched Step';
                    if (!empty($stage->steps[$stepIndex + 1])) { // Another step in stage, move batch to it
                        $batch->step_id = $stage->steps[$stepIndex + 1]->id; //
                        $successMsg = $batch->name . ' moved to next step.';
                    } else { // No steps left in stage, check for another stage
                        if (!empty($batch->growth_profile->stages[$stageIndex + 1])) { // Another stage exists, move batch to first step
                            $batch->step_id = $batch->growth_profile->stages[$stageIndex + 1]->steps[0]->id; // Set step id to next stage's first step
                            $successMsg = $batch->name . ' moved to step ' . $batch->growth_profile->stages[$stageIndex + 1]->steps[0]->name . ' in another stage.';
                        } else { // No more steps or stages, finish batch
                            $batch->step_id = null;
                            $successMsg = $batch->name . ' finished the final step.';
                        }
                    }
                }
            }
        }

        if ($this->Batches->save($batch)) {
            $this->Flash->success($successMsg);
        } else {
            $this->Flash->error('Error moving batch to next step.');
        }

        return $this->redirect($this->referer());
        $this->set(compact('batch'));
        $this->viewBuilder()->setTemplate('view1');
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $batch = $this->Batches->newEntity();
        if ($this->request->is('post')) {
            $data = $this->request->getData();
            $data['user_id'] = $this->Auth->User('id');
            $data['testing_status'] = 0;
            //$data['plant_date'] = [ 'year' => '2020', 'month' => '24', 'day' => '01', 'hour' => '09','minute' => '48'];
            //$data['plant_date'] = str_replace('/','-', $data['plant_date'] ?? '');
            $batch = $this->Batches->patchEntity($batch, $data);
            $batch->business_id = $this->Auth->User('business_id');
            if ($this->Batches->save($batch)) {
                $this->Flash->success(__('The batch has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The batch could not be saved. Please, try again.'));
        }
        //$users = $this->Batches->Users->find('list', ['limit' => 200]);
        $growthProfiles = $this->Batches->GrowthProfiles->find('list', ['limit' => 200]);
        $plants = $this->Batches->Plants->find('list', ['limit' => 200]);
        $this->set(compact('batch', 'growthProfiles', 'plants'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Batch id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $batch = $this->Batches->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $data = $this->request->getData();
            $data['user_id'] = $this->Auth->User('id');
            $batch = $this->Batches->patchEntity($batch, $data);
            if ($this->Batches->save($batch)) {
                $this->Flash->success(__('The batch has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The batch could not be saved. Please, try again.'));
        }
        $users = $this->Batches->Users->find('list', ['limit' => 200]);
        $growthProfiles = $this->Batches->GrowthProfiles->find('list', ['limit' => 200]);
        $plants = $this->Batches->Plants->find('list', ['limit' => 200]);
        $this->set(compact('batch', 'users', 'growthProfiles', 'plants'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Batch id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $batch = $this->Batches->get($id);
        if ($this->Batches->delete($batch)) {
            $this->Flash->success(__('The batch has been deleted.'));
        } else {
            $this->Flash->error(__('The batch could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function qrCode($id = null)
    {
        if ($this->request->is('post')) {                                                              // If request is a post
            $this->viewBuilder()->setLayout('qr_code');                                               // Set layout to qr_code
            $this->viewBuilder()->setTemplate('qr_code_display');                                     // Set template file to qr_code_display
            $batch = $this->Batches->get($id, [                                                             // Get this batch's information
                'contain' => ['GrowthProfiles', 'Plants'],                                                  // Also get the related plant and growth profile data
            ]);
            $fields = $this->request->getData();                                                            // Get the form data that was submitted on post
            $qrUrl = Router::url(['controller' => 'Batches', 'action' => 'view', $id], ['_full' => true]);  // Get the full URL to the batch
            $this->set(compact('batch', 'qrUrl', 'fields'));                                    // Pass necessary data to the view
        }                                                                                                   // Otherwise not a post and just display the regular layout and view for this method
    }

    /**
     * View Notes method
     *
     * @param string|null $id Batch id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function viewNotes($id = null)
    {
        $batch = $this->Batches->get($id);
        $notes = $this->paginate($this->Batches->Notes->find('all',[
            'conditions' => [
                'batch_id' => $batch->id
            ],
            'contain' => [
                'Users', 'Steps.Stages'
            ]
        ]));

        $this->set(compact('batch', 'notes'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function addNote($id = null)
    {
        $batch = $this->Batches->get($id, [
            'contain' => [],
        ]);
        $note = $this->Batches->Notes->newEntity();
        if ($this->request->is('post')) {
            $data = $this->request->getData();
            $data['user_id'] = $this->Auth->User('id');
            $data['batch_id'] = $batch->id;
            $data['step_id'] = $batch->step_id;
            $note = $this->Batches->Notes->patchEntity($note, $data);
            if ($this->Batches->Notes->save($note)) {
                $this->Flash->success(__('The note has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The note could not be saved. Please, try again.'));
        }
        $this->set(compact('note'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Note id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function editNote($id = null)
    {
        var_dump($this->referer());
        $note = $this->Batches->Notes->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $note = $this->Batches->Notes->patchEntity($note, $this->request->getData());
            if ($this->Batches->Notes->save($note)) {
                $this->Flash->success(__('The note has been saved.'));

                return $this->redirect($this->referer());
            }
            $this->Flash->error(__('The note could not be saved. Please, try again.'));
        }
        if ($this->request->is('get')) {
            $redirect = $this->referer();
        }
        $this->set(compact('note', 'redirect'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Note id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function deleteNote($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $note = $this->Batches->Notes->get($id);
        if ($this->Batches->Notes->delete($note)) {
            $this->Flash->success(__('The note has been deleted.'));
        } else {
            $this->Flash->error(__('The note could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Note id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function setYield($id = null)
    {
        $batch = $this->Batches->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $data = $this->request->getData();
            $batch = $this->Batches->patchEntity($batch, $data);
            if ($this->Batches->save($batch)) {
                $this->Flash->success(__('Yield has been saved.'));

                return $this->redirect(['action' => 'view', $id]);
            }
            $this->Flash->error(__('The yield could not be saved. Please, try again.'));
        }
        $this->set(compact('batch'));
    }
    /**
     * View Readings method
     *
     * @param string|null $id Batch id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function viewReadings($id = null)
    {
        $batch = $this->Batches->get($id);
        $readings = $this->paginate($this->Batches->Readings->find('all',[
            'conditions' => [
                'batch_id' => $batch->id
            ],
            'contain' => [
                'Steps.Stages'
            ]
        ]));

        $this->set(compact('batch', 'readings'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function addReading($id = null)
    {
        $batch = $this->Batches->get($id, [
            'contain' => [],
        ]);
        $reading = $this->Batches->Readings->newEntity();
        if ($this->request->is('post')) {
            $data = $this->request->getData();
            $data['user_id'] = $this->Auth->User('id');
            $data['batch_id'] = $batch->id;
            $data['step_id'] = $batch->step_id;
            $reading = $this->Batches->Readings->patchEntity($reading, $data);
            if ($this->Batches->Readings->save($reading)) {
                $this->Flash->success(__('The reading has been saved.'));

                return $this->redirect(['action' => 'view', $id]);
            }
            $this->Flash->error(__('The reading could not be saved. Please, try again.'));
        }
        foreach ($this->readingTypes as $readingType) {
            $readingTypes[$readingType] = $readingType;
        }
        $this->set(compact('reading', 'readingTypes'));
    }
}
