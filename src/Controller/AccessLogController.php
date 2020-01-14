<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * AccessLog Controller
 *
 * @property \App\Model\Table\AccessLogTable $AccessLog
 *
 * @method \App\Model\Entity\AccessLog[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class AccessLogController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $accessLog = $this->paginate($this->AccessLog);

        $this->set(compact('accessLog'));
    }

    /**
     * View method
     *
     * @param string|null $id Access Log id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $accessLog = $this->AccessLog->get($id);

        $this->set('accessLog', $accessLog);
    }

}
