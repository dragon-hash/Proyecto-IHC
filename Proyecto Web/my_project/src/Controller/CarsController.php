<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Cars Controller
 *
 * @property \App\Model\Table\CarsTable $Cars
 *
 * @method \App\Model\Entity\Car[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class CarsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Users']
        ];
        $roleUser=$this->request->getSession()->read('Auth.User.role');
        if ($roleUser==='Administrador') {
             $cars = $this->paginate($this->Cars);
        }elseif ($roleUser==='Cliente') {
            $cars = $this->paginate($this->Cars->findByUserId($this->request->getSession()->read('Auth.User.id')));
        }

        $this->set(compact('cars'));
    }

    /**
     * View method
     *
     * @param string|null $id Car id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $car = $this->Cars->get($id, [
            'contain' => ['Users', 'Mechanics']
        ]);

        $this->set('car', $car);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
   public function add()
    {
        $car = $this->Cars->newEntity();
        if ($this->request->is('post')) {
            $car = $this->Cars->patchEntity($car, $this->request->getData());

            $roleUser=$this->request->getSession()->read('Auth.User.role');
            if ($roleUser==='Administrador') {
                if ($this->Cars->save($car)) {
                    $this->Flash->success(__('The car has been saved.'));

                    return $this->redirect(['action' => 'index']);
                }
            }elseif ($roleUser==='Cliente') {
                $car->user_id=$this->request->getSession()->read('Auth.User.id');
                if ($this->Cars->save($car)) {
                    $this->Flash->success(__('The car has been saved.'));

                    return $this->redirect(['action' => 'index']);
                }
            }

            $this->Flash->error(__('The car could not be saved. Please, try again.'));
        }
        $users = $this->Cars->Users->find('list', ['limit' => 200]);
        $mechanics = $this->Cars->Mechanics->find('list', ['limit' => 200]);
        $this->set(compact('car', 'users', 'mechanics'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Car id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $car = $this->Cars->get($id, [
            'contain' => ['Mechanics']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $car = $this->Cars->patchEntity($car, $this->request->getData());
            if ($this->Cars->save($car)) {
                $this->Flash->success(__('The car has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The car could not be saved. Please, try again.'));
        }
        $users = $this->Cars->Users->find('list', ['limit' => 200]);
        $mechanics = $this->Cars->Mechanics->find('list', ['limit' => 200]);
        $this->set(compact('car', 'users', 'mechanics'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Car id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $car = $this->Cars->get($id);
        if ($this->Cars->delete($car)) {
            $this->Flash->success(__('The car has been deleted.'));
        } else {
            $this->Flash->error(__('The car could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
public function isAuthorized($user)
    {
         
        if($user['status'] == true){ //verifica que el usuario este activo
            
            if(isset($user['role']) && $user['role'] === 'Cliente'){

                if(in_array($this->request->getParam('action'),['index','view','add','delete','edit'])){
                    return true;
                }
            }
            return parent::isAuthorized($user);

        }
        return false; //false
    }
}
