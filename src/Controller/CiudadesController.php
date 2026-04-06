<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Ciudades Controller
 *
 * @property \App\Model\Table\CiudadesTable $Ciudades
 */
class CiudadesController extends AppController
{
    /**
     * Index method - Listado de ciudades
     */
    public function index()
    {
        $ciudades = $this->paginate($this->Ciudades);
        $this->set(compact('ciudades'));
    }

    /**
     * View method - Ver detalles de una ciudad
     */
    public function view($id = null)
    {
        $ciudad = $this->Ciudades->get($id);
        $this->set(compact('ciudad'));
    }

    /**
     * Add method - Agregar nueva ciudad
     */
    public function add()
    {
        $ciudad = $this->Ciudades->newEmptyEntity();
        if ($this->request->is('post')) {
            $ciudad = $this->Ciudades->patchEntity($ciudad, $this->request->getData());
            if ($this->Ciudades->save($ciudad)) {
                $this->Flash->success(__('La ciudad ha sido guardada.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('No se pudo guardar la ciudad. Intenta de nuevo.'));
        }
        $this->set(compact('ciudad'));
    }

    /**
     * Edit method - Editar ciudad existente
     */
    public function edit($id = null)
    {
        $ciudad = $this->Ciudades->get($id);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $ciudad = $this->Ciudades->patchEntity($ciudad, $this->request->getData());
            if ($this->Ciudades->save($ciudad)) {
                $this->Flash->success(__('La ciudad ha sido actualizada.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('No se pudo actualizar la ciudad.'));
        }
        $this->set(compact('ciudad'));
    }

    /**
     * Delete method - Eliminar ciudad
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $ciudad = $this->Ciudades->get($id);
        if ($this->Ciudades->delete($ciudad)) {
            $this->Flash->success(__('La ciudad ha sido eliminada.'));
        } else {
            $this->Flash->error(__('No se pudo eliminar la ciudad.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}