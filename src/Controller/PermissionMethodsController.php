<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * PermissionMethods Controller
 *
 *
 * @method \App\Model\Entity\PermissionMethod[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class PermissionMethodsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $permissionMethods = $this->paginate($this->PermissionMethods);

        $this->set(compact('permissionMethods'));
    }

    /**
     * View method
     *
     * @param string|null $id Permission Method id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $permissionMethod = $this->PermissionMethods->get($id, [
            'contain' => [],
        ]);

        $this->set('permissionMethod', $permissionMethod);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $permissionMethod = $this->PermissionMethods->newEntity();
        if ($this->request->is('post')) {
            $permissionMethod = $this->PermissionMethods->patchEntity($permissionMethod, $this->request->getData());
            if ($this->PermissionMethods->save($permissionMethod)) {
                $this->Flash->success(__('The permission method has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The permission method could not be saved. Please, try again.'));
        }
        $this->set(compact('permissionMethod'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Permission Method id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $permissionMethod = $this->PermissionMethods->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $permissionMethod = $this->PermissionMethods->patchEntity($permissionMethod, $this->request->getData());
            if ($this->PermissionMethods->save($permissionMethod)) {
                $this->Flash->success(__('The permission method has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The permission method could not be saved. Please, try again.'));
        }
        $this->set(compact('permissionMethod'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Permission Method id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $permissionMethod = $this->PermissionMethods->get($id);
        if ($this->PermissionMethods->delete($permissionMethod)) {
            $this->Flash->success(__('The permission method has been deleted.'));
        } else {
            $this->Flash->error(__('The permission method could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
