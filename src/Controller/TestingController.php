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
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $this->loadModel('Batches');
        $this->paginate = [
            'contain' => ['Users', 'GrowthProfiles', 'Plants'],
            'limit' => 5
        ];
        $batches = $this->paginate($this->Batches);
        $testingStatuses = $this->testingStatuses;

        $this->set(compact('batches', 'testingStatuses'));
    }

}
