<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Class TestingController
 * @package App\Controller
 */
class TestingController extends AppController
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
        $this->loadModel('Batches');
        $batches['unsent'] = $this->Batches->find('all')->where(['testing_status' => 0, 'step_id  IS NULL', 'plant_date  IS NOT NULL'])->limit(10)->toList();
        $batches['inprogress'] = $this->Batches->find('all')->where(['testing_status' => 1])->limit(10)->toList();
        $batches['passed'] = $this->Batches->find('all')->where(['testing_status' => 2])->limit(10)->toList();
        $batches['failed'] = $this->Batches->find('all')->where(['testing_status' => 3])->limit(10)->toList();
        $testingStatuses = $this->testingStatuses;

        $this->set(compact('batches', 'testingStatuses'));
    }

    public function setInProgress($id = null) {
        $this->loadModel('Batches');
        $batch = $this->Batches->get($id);
        $batch->testing_status = 1;
        if($this->Batches->save($batch)) {
            $this->Flash->success('Batch moved to in progress.');
        } else {
            $this->Flash->error('Error moving batch.');
        }
        $this->redirect($this->referer());
    }

    public function setPassed($id = null) {
        $this->loadModel('Batches');
        $batch = $this->Batches->get($id);
        $batch->testing_status = 2;
        if($this->Batches->save($batch)) {
            $this->Flash->success('Batch moved to passed.');
        } else {
            $this->Flash->error('Error moving batch.');
        }
        $this->redirect($this->referer());
    }

    public function setFailed($id = null) {
        $this->loadModel('Batches');
        $batch = $this->Batches->get($id);
        $batch->testing_status = 3;
        if($this->Batches->save($batch)) {
            $this->Flash->success('Batch moved to failed.');
        } else {
            $this->Flash->error('Error moving batch.');
        }
        $this->redirect($this->referer());
    }

}
