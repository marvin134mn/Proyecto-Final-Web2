<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Acciones') ?></h4>
            <?= $this->Form->postLink(
                __('Borrar Usuario'),
                ['action' => 'delete', $user->id],
                ['confirm' => __('¿Estás seguro de que deseas eliminar al usuario # {0}?', $user->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('Listar Usuarios'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="users form content">
            <?= $this->Form->create($user) ?>
            <fieldset>
                <legend><?= __('Editar Usuario') ?></legend>
                <?php
                    echo $this->Form->control('nombre');
                    echo $this->Form->control('apellido');
                    echo $this->Form->control('telefono');
                    echo $this->Form->control('correo');
                    
                    // Selector de Idioma
                    echo $this->Form->control('language', [
                        'type' => 'select',
                        'options' => [
                            'es' => 'es', 
                            'en' => 'en'
                        ],
                        'label' => __('Idioma'),
                        'empty' => false
                    ]);

                    // --- CAMBIO AQUÍ: Usamos tu sesión manual ---
                    $userSesion = $this->request->getSession()->read('Auth.User');
                    
                    if (isset($userSesion['role']) && $userSesion['role'] === 'admin') {
                        echo $this->Form->control('role', [
                            'type' => 'select',
                            'options' => [
                                'admin' => 'Administrador',
                                'cliente' => 'Cliente'
                            ],
                            'label' => __('Asignar Rol (Privilegio Admin)'),
                            'empty' => false
                        ]);
                    }
                ?>
            </fieldset>
            <?= $this->Form->button(__('Guardar Cambios')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>