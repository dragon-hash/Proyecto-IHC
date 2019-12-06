<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Mechanics Controller
 *
 * @property \App\Model\Table\MechanicsTable $Mechanics
 *
 * @method \App\Model\Entity\Mechanic[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class MechanicsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Services']
        ];
        $mechanics = $this->paginate($this->Mechanics);

        $this->set(compact('mechanics'));
    }

    /**
     * View method
     *
     * @param string|null $id Mechanic id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $mechanic = $this->Mechanics->get($id, [
            'contain' => ['Services', 'Cars']
        ]);

        $this->set('mechanic', $mechanic);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $mechanic = $this->Mechanics->newEntity();
        if ($this->request->is('post')) {
            $mechanic = $this->Mechanics->patchEntity($mechanic, $this->request->getData());
            if ($this->Mechanics->save($mechanic)) {
                $this->Flash->success(__('The mechanic has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The mechanic could not be saved. Please, try again.'));
        }
        $services = $this->Mechanics->Services->find('list', ['limit' => 200]);
        $cars = $this->Mechanics->Cars->find('list', ['limit' => 200]);
        $this->set(compact('mechanic', 'services', 'cars'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Mechanic id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $mechanic = $this->Mechanics->get($id, [
            'contain' => ['Cars']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $mechanic = $this->Mechanics->patchEntity($mechanic, $this->request->getData());
            if ($this->Mechanics->save($mechanic)) {
                $this->Flash->success(__('The mechanic has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The mechanic could not be saved. Please, try again.'));
        }
        $services = $this->Mechanics->Services->find('list', ['limit' => 200]);
        $cars = $this->Mechanics->Cars->find('list', ['limit' => 200]);
        $this->set(compact('mechanic', 'services', 'cars'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Mechanic id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $mechanic = $this->Mechanics->get($id);
        if ($this->Mechanics->delete($mechanic)) {
            $this->Flash->success(__('The mechanic has been deleted.'));
        } else {
            $this->Flash->error(__('The mechanic could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
public function isAuthorized($user)
    {
         
        if($user['status'] == true){ //verifica que el usuario este activo
            
            if(isset($user['role']) && $user['role'] === 'Cliente'){

                if(in_array($this->request->getParam('action'),['index','view'])){
                    return true;
                }
            }
            return parent::isAuthorized($user);

        }
        return false; //false
    }
}
