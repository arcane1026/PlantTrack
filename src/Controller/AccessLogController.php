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
        $accessLog = $this->paginate($this->AccessLog, ['order' => ['AccessLog.created' => 'desc']]);

        $this->set(compact('accessLog'));
    }

}
