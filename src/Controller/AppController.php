<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link      https://cakephp.org CakePHP(tm) Project
 * @since     0.2.9
 * @license   https://opensource.org/licenses/mit-license.php MIT License
 */
namespace App\Controller;

use Cake\Controller\Controller;
use Cake\Routing\Router;
use Cake\Event\Event;
use Exception;

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @link https://book.cakephp.org/3.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller
{
    protected $testingStatuses = [
        ['icon' => 'box', 'name' => 'Untested', 'style' => 'default'],
        ['icon' => 'sync', 'name' => 'In Progress', 'style' => 'warning'],
        ['icon' => 'badge-check', 'name' => 'Passed', 'style' => 'success'],
        ['icon' => 'times', 'name' => 'Failed', 'style' => 'danger']
    ];

    protected $stageStepStatuses = [
        'danger' => 'Incomplete',
        'warning' => 'In Progress',
        'success' => 'Complete',
    ];

    protected $userRoles = [
        ['name' => 'Employee'],
        ['name' => 'Manager'],
        ['name' => 'Owner'],
        ['name' => 'Admin']
    ];

    protected $readingTypes = [
        'Temperature',
        'Humidity',
        'PH',
    ];

    protected $plantCount;
    protected $batchCount;
    protected $growthProfileCount;

    /**
     * Initialization hook method.
     *
     * Use this method to add common initialization code like loading components.
     *
     * e.g. `$this->loadComponent('Security');`
     *
     * @return void
     * @throws Exception
     */
    public function initialize()
    {
        parent::initialize();

        $this->loadComponent('RequestHandler', [
            'enableBeforeRedirect' => false,
        ]);
        $this->loadComponent('Flash');

        /*
         * Enable the following component for recommended CakePHP security settings.
         * see https://book.cakephp.org/3.0/en/controllers/components/security.html
         */
        //$this->loadComponent('Security');
        // Existing code

        $this->loadComponent('Auth', [
            'authenticate' => [
                'Form' => [
                    'fields' => [
                        'username' => 'username',
                        'password' => 'password'
                    ]
                ]
            ],
            'loginAction' => [
                'controller' => 'Users',
                'action' => 'login'
            ],
            'authorize' => 'Controller',
            'authError' => 'You are not authorized to access that location.',
            // If unauthorized, return them to page they were just on
            'unauthorizedRedirect' => $this->referer()
        ]);


        // Allow the display action so our PagesController
        // continues to work. Also enable the read only actions.
        //$this->Auth->allow(['display', 'view', 'index', 'edit', 'add', 'delete']);
        $this->loadModel('Businesses');

        $activeUser = [];
        $activeUser['username'] = $this->Auth->User('username');
        $activeUser['first_name'] = $this->Auth->User('first_name');
        $activeUser['last_name'] = $this->Auth->User('last_name');
        $activeUser['id'] = $this->Auth->User('id');
        $activeUser['business_id'] = $this->Auth->User('business_id');
        $activeUser['role'] = $this->Auth->User('role');
        $activeUser['business_name'] = $this->Businesses->find('all')->where(['id' => $this->Auth->User('business_id')])->first()->name ?? 'Business Not Found';
        $webroot = Router::url('/', true);
        $controller = $this->getName();
        $action = $this->request->getParam('action');
        $activePrimaryNav = $controller;
        $userRoles = $this->userRoles;
        if ($this->Auth->User('role') < 3) {
            $this->loadModel('Plants');
            $this->loadModel('GrowthProfiles');
            $this->loadModel('Batches');
            $this->plantCount = $plantCount = $this->Plants->find('all')->where(['Plants.business_id' => $this->Auth->User('business_id')])->count();
            $this->growthProfileCount = $growthProfileCount = $this->GrowthProfiles->find('all')->where(['GrowthProfiles.business_id' => $this->Auth->User('business_id')])->count();
            $this->batchCount = $batchCount = $this->Batches->find('all')->where(['Batches.business_id' => $this->Auth->User('business_id')])->count();
        } else {
            $plantCount = -1;
            $growthProfileCount = -1;
            $batchCount = -1;
        }

        $this->set(compact('activeUser', 'webroot', 'activePrimaryNav', 'action', 'userRoles', 'plantCount', 'growthProfileCount', 'batchCount'));
    }

    /**
     * Redirect (Override)
     *
     * Redirects the user to the referrer unless there is a hidden field with another URL.
     *
     * @param array|string $url
     * @param int $status
     * @return \Cake\Http\Response|null
     */
    public function redirect($url, $status = 302)
    {
        if ($this->request->getData('redirect', '')) {
            return parent::redirect($this->request->getData('redirect'), $status);
        }
        return parent::redirect($url, $status);
    }

    protected function redirectReferrerNoLogin() {

    }
}
