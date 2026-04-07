<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 */
class UsersController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $query = $this->Users->find();
        $users = $this->paginate($query);

        $this->set(compact('users'));
    }

    /**
     * View method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $user = $this->Users->get($id, contain: []);
        $this->set(compact('user'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
public function add()
{
    $user = $this->Users->newEmptyEntity();
    if ($this->request->is('post')) {
        // Atrapamos los datos del formulario
        $user = $this->Users->patchEntity($user, $this->request->getData());
        
        // REVISIÓN DE ROL: 
        // Leemos la sesión manual que creaste en tu función login()
        $sessionUser = $this->request->getSession()->read('Auth.User');

        // Si NO hay nadie logueado o el que está no es 'admin', se le clava el rol 'cliente'
        if (!$sessionUser || $sessionUser['role'] !== 'admin') {
            $user->role = 'cliente';
        }

        if ($this->Users->save($user)) {
            $this->Flash->success(__('Registro exitoso. Ya puedes iniciar sesión.'));
            return $this->redirect(['action' => 'login']);
        }
        $this->Flash->error(__('No se pudo guardar el usuario. Inténtalo de nuevo.'));
    }
    $this->set(compact('user'));
}

    /**
     * Edit method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $user = $this->Users->get($id, contain: []);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $this->set(compact('user'));
    }

    /**
     * Delete method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $user = $this->Users->get($id);
        if ($this->Users->delete($user)) {
            $this->Flash->success(__('The user has been deleted.'));
        } else {
            $this->Flash->error(__('The user could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
    public function login()
    {
        // Si ya está logueado, mandarlo a CIUDADES
        if ($this->request->getSession()->check('Auth.User')) {
            return $this->redirect(['controller' => 'Ciudades', 'action' => 'index']);
        }

        if ($this->request->is('post')) {
            $correo = $this->request->getData('correo');
            $password = $this->request->getData('password');

            $user = $this->Users->find()
                ->where(['correo' => $correo, 'password' => $password])
                ->first();

            if ($user) {
                $this->request->getSession()->write('Auth.User', $user);
                
                // --- ESTA ES LA LÍNEA QUE DEBES CAMBIAR ---
                // Agregamos 'controller' => 'Ciudades' para que salte de controlador
                return $this->redirect(['controller' => 'Ciudades', 'action' => 'index']);
            }
            $this->Flash->error('Correo o contraseña incorrectos.');
        }
    }

public function logout()
{
    $this->request->getSession()->delete('Auth.User');
    $this->Flash->success('Sesión cerrada correctamente.');
    return $this->redirect(['action' => 'login']);
}
}
