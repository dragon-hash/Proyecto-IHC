<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Roles Controller
 *
 * @property \App\Model\Table\RolesTable $Roles
 *
 * @method \App\Model\Entity\Role[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ReportesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function circular()
    {
        
    }
     public function barra()
    {
        
    }
     public function lineal()
    {
        
    }
     public function particion()
    {
        
    }
     public function grafo()
    {
        
    }
    public function isAuthorized($user)
    {
         
        if($user['status'] == true){ //verifica que el usuario este activo
            
            if(isset($user['role']) && $user['role'] === 'Cliente'){
                return false;
            }
            return parent::isAuthorized($user);
        }
        return false; //false
    }
}
