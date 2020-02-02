<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Dashbard Controller
 *
 * @method \App\Model\Entity\Batch[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class DashboardController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $this->loadModel('AccessLog');
        $lastLogin = $this->AccessLog->find('all')->where(['username' => $this->Auth->User('username')])->order(['AccessLog.created' => 'desc'])->limit(2)->all()->toList()[1];
        $lastLoginDate = $lastLogin['created'];
        $lastLoginIp = $lastLogin['ip_address'];
        $this->set(compact('lastLoginDate', 'lastLoginIp'));
    }

}
