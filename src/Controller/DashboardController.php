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
        $this->loadModel('AccessLog');
        $lastLogin = $this->AccessLog->find('all')->where(['username' => $this->Auth->User('username')])->order(['AccessLog.created' => 'desc'])->limit(2)->all()->toList();
        $lastLoginDate = '';
        $lastLoginIp = '';
        if (!empty($lastLogin) && is_array($lastLogin) && array_key_exists(1, $lastLogin))
        {
            $lastLoginDate = $lastLogin[1]['created'];
            $lastLoginIp = $lastLogin[1]['ip_address'];
        }
        if ($this->Auth->User('role') === 2) {
            $this->loadModel('Plants');
            $this->loadModel('GrowthProfiles');
            $this->loadModel('Batches');
            $plants = $this->Plants->find('all')->count();
            $growthProfiles = $this->GrowthProfiles->find('all')->count();
            $batches = $this->Batches->find('all')->count();
        }
        $this->set(compact('lastLoginDate', 'lastLoginIp', 'plants', 'batches', 'growthProfiles'));
    }

}
