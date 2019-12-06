<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Replacements Controller
 *
 * @property \App\Model\Table\ReplacementsTable $Replacements
 *
 * @method \App\Model\Entity\Replacement[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ReplacementsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Categories']
        ];
        $replacements = $this->paginate($this->Replacements);

        $this->set(compact('replacements'));
    }

    /**
     * View method
     *
     * @param string|null $id Replacement id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $replacement = $this->Replacements->get($id, [
            'contain' => ['Categories', 'Details']
        ]);

        $this->set('replacement', $replacement);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $replacement = $this->Replacements->newEntity();
        if ($this->request->is('post')) {
            $replacement = $this->Replacements->patchEntity($replacement, $this->request->getData());
            if ($this->Replacements->save($replacement)) {
                $this->Flash->success(__('The replacement has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The replacement could not be saved. Please, try again.'));
        }
        $categories = $this->Replacements->Categories->find('list', ['limit' => 200]);
        $this->set(compact('replacement', 'categories'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Replacement id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $replacement = $this->Replacements->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $replacement = $this->Replacements->patchEntity($replacement, $this->request->getData());
            if ($this->Replacements->save($replacement)) {
                $this->Flash->success(__('The replacement has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The replacement could not be saved. Please, try again.'));
        }
        $categories = $this->Replacements->Categories->find('list', ['limit' => 200]);
        $this->set(compact('replacement', 'categories'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Replacement id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $replacement = $this->Replacements->get($id);
        if ($this->Replacements->delete($replacement)) {
            $this->Flash->success(__('The replacement has been deleted.'));
        } else {
            $this->Flash->error(__('The replacement could not be deleted. Please, try again.'));
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
