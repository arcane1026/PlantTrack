<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Readings Controller
 *
 * @property \App\Model\Table\ReadingsTable $Readings
 *
 * @method \App\Model\Entity\Reading[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ReadingsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Steps', 'Batches'],
        ];
        $readings = $this->paginate($this->Readings);

        $this->set(compact('readings'));
    }

    /**
     * View method
     *
     * @param string|null $id Reading id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $reading = $this->Readings->get($id, [
            'contain' => ['Steps', 'Batches'],
        ]);

        $this->set('reading', $reading);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $reading = $this->Readings->newEntity();
        if ($this->request->is('post')) {
            $reading = $this->Readings->patchEntity($reading, $this->request->getData());
            if ($this->Readings->save($reading)) {
                $this->Flash->success(__('The reading has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The reading could not be saved. Please, try again.'));
        }
        $steps = $this->Readings->Steps->find('list', ['limit' => 200]);
        $batches = $this->Readings->Batches->find('list', ['limit' => 200]);
        $this->set(compact('reading', 'steps', 'batches'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Reading id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $reading = $this->Readings->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $reading = $this->Readings->patchEntity($reading, $this->request->getData());
            if ($this->Readings->save($reading)) {
                $this->Flash->success(__('The reading has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The reading could not be saved. Please, try again.'));
        }
        $steps = $this->Readings->Steps->find('list', ['limit' => 200]);
        $batches = $this->Readings->Batches->find('list', ['limit' => 200]);
        $this->set(compact('reading', 'steps', 'batches'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Reading id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $reading = $this->Readings->get($id);
        if ($this->Readings->delete($reading)) {
            $this->Flash->success(__('The reading has been deleted.'));
        } else {
            $this->Flash->error(__('The reading could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
