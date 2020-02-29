<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Reports Controller
 *
 * @property \App\Model\Table\ReportsTable $Reports
 *
 * @method \App\Model\Entity\Report[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ReportsController extends AppController
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
        $this->paginate = [
            'contain' => ['Users', 'Batches'],
        ];
        $reports = $this->paginate($this->Reports);

        $this->set(compact('reports'));
    }

    /**
     * View method
     *
     * @param string|null $id Report id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $report = $this->Reports->get($id, [
            'contain' => ['Users', 'Batches'],
        ]);

        $this->set('report', $report);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $report = $this->Reports->newEntity();
        if ($this->request->is('post')) {
            $report = $this->Reports->patchEntity($report, $this->request->getData());
            if ($this->Reports->save($report)) {
                $this->Flash->success(__('The report has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The report could not be saved. Please, try again.'));
        }
        $users = $this->Reports->Users->find('list', ['limit' => 200]);
        $batches = $this->Reports->Batches->find('list', ['limit' => 200]);
        $this->set(compact('report', 'users', 'batches'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Report id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $report = $this->Reports->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $report = $this->Reports->patchEntity($report, $this->request->getData());
            if ($this->Reports->save($report)) {
                $this->Flash->success(__('The report has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The report could not be saved. Please, try again.'));
        }
        $users = $this->Reports->Users->find('list', ['limit' => 200]);
        $batches = $this->Reports->Batches->find('list', ['limit' => 200]);
        $this->set(compact('report', 'users', 'batches'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Report id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $report = $this->Reports->get($id);
        if ($this->Reports->delete($report)) {
            $this->Flash->success(__('The report has been deleted.'));
        } else {
            $this->Flash->error(__('The report could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }


    public function generateChart()// batches by user ID
    {
        $this->loadModel('Batches'); // Load Batches Model
        $value = $this->Batches->find()->first(); //

        // trying to get all plant_ids from batches table
        $userIdsInBatches = $this->Batches->find()->extract('user_id');// returns a list of all user Ids in the Batches table

        $chartValues = [];


        $chartLabels = [];

        $chartValues = [];


        foreach ($userIdsInBatches as $ids) {

            if (!in_array($ids, $chartLabels)) {
                array_push($chartLabels, $ids);
            }
        }

        foreach ($chartLabels as $users) {
            $value = $this->Batches->find()->where(['user_id' => $users])->count();// returns a list of all user Ids in the Batches table
            array_push($chartValues, $value);
        }


        $this->set('xLabels', $chartLabels);
        $this->set('yValues', $chartValues);
    }

    public function generateChart2()// batches by Plant
    {

        $this->loadModel('Batches'); // Load Batches Model
        $business_id = $this->Auth->User('business_id'); // Get business id associated with logged in user

        // Get all plant ids that are in the batches table
        $plantIdsInBatches = $this->Batches->find()->extract('plant_id');// returns a list of all user Ids in the Batches table
        $chartLabels1 = [];// Array of all UNIQUE plant Ids in the batches table
        $chartLabels2 = [];// because we can only pull id ids from the table we will need to convert into the associated plant names in the plant table
        $chartValues = [];// Array to hold chart values

        // Push all unique ids into array
        foreach ($plantIdsInBatches as $ids) {
            if (!in_array($ids, $chartLabels1)) {
                array_push($chartLabels1, $ids);
            }
        }

        // Convert to associated plant_name
        foreach ($chartLabels1 as $idFromBatchTable) {
            $niceLabelObject = $this->Batches->Plants->find()->where(['id' => $idFromBatchTable])->first();// Query plant table for the plant name associated with the id from batches table
            $niceLabel = $niceLabelObject['name'];
            array_push($chartLabels2, $niceLabel);
        }

        // Query to count number of batches of a particular plant type
        foreach ($chartLabels1 as $idFromBatchTable) {
            $value = $this->Batches->find()->where(['plant_id' => $idFromBatchTable])->count();// returns a list of all user Ids in the Batches table
            array_push($chartValues, $value);
        }

        // Set labels and values
        $this->set('xLabels', $chartLabels2);
        $this->set('yValues', $chartValues);
    }

}
