<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * AccessLog Controller
 *
 * @property \App\Model\Table\AccessLogsTable $AccessLog
 *
 * @method \App\Model\Entity\AccessLog[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class AccessLogController extends AppController
{

    public function isAuthorized($user = null)
    {
        switch($this->request->getParam('action')) { // Switch on the requested action
            case 'index': // Case for action is index
                return (bool)($user['role'] === 3); // If user['role'] is 3 then return true, else false
                break;
            default:
                return true;
        }

        // Default deny
        return true;
    }

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
