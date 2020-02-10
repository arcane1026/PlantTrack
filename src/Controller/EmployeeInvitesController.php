<?php

namespace App\Controller;

use App\Controller\AppController;
use Cake\Mailer\Email;
use Cake\Routing\Router;

/**
 * EmployeeInvites Controller
 *
 * @property \App\Model\Table\EmployeeInvitesTable $EmployeeInvites
 *
 * @method \App\Model\Entity\EmployeeInvite[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class EmployeeInvitesController extends AppController
{
    /**
     * @var bool|object
     */

    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $employeeInvites = $this->paginate($this->EmployeeInvites);
        $this->set(compact('employeeInvites'));
    }

    /**
     * View method
     *
     * @param string|null $id Employee Invite id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $employeeInvite = $this->EmployeeInvites->get($id, [
            'contain' => [],
        ]);

        $this->set('employeeInvite', $employeeInvite);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $employeeInvite = $this->EmployeeInvites->newEntity();
        if ($this->request->is('post')) {
            $employeeInvite = $this->EmployeeInvites->patchEntity($employeeInvite, $this->request->getData());
            if ($this->EmployeeInvites->save($employeeInvite)) {
                $this->Flash->success(__('The employee invite has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The employee invite could not be saved. Please, try again.'));
        }
        $this->set(compact('employeeInvite'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Employee Invite id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $employeeInvite = $this->EmployeeInvites->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $employeeInvite = $this->EmployeeInvites->patchEntity($employeeInvite, $this->request->getData());
            if ($this->EmployeeInvites->save($employeeInvite)) {
                $this->Flash->success(__('The employee invite has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The employee invite could not be saved. Please, try again.'));
        }
        $this->set(compact('employeeInvite'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Employee Invite id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $employeeInvite = $this->EmployeeInvites->get($id);
        if ($this->EmployeeInvites->delete($employeeInvite)) {
            $this->Flash->success(__('The employee invite has been deleted.'));
        } else {
            $this->Flash->error(__('The employee invite could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
