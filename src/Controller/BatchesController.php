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
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Users', 'GrowthProfiles', 'Plants'],
            'limit' => 5
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
            'contain' => ['Users', 'GrowthProfiles', 'Plants', 'Notes', 'Readings', 'Reports'],
        ]);

        $this->set('batch', $batch);
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
            //$data['plant_date'] = '01/24/2020 09:48 AM';
            //$data['plant_date'] = [ 'year' => '2020', 'month' => '24', 'day' => '01', 'hour' => '09','minute' => '48'];
            $data['plant_date'] = str_replace('/','-',$data['plant_date']);

            Log::write('debug', $data);
            $batch = $this->Batches->patchEntity($batch, $data);
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

    public function testing()
    {

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
}
