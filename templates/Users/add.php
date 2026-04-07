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
            <?= $this->Html->link(__('Listar Usuarios'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="users form content">
            <?= $this->Form->create($user) ?>
            <fieldset>
                <legend><?= __('Agregar Usuario') ?></legend>
                <?php
                    echo $this->Form->control('nombre');
                    echo $this->Form->control('apellido');
                    echo $this->Form->control('telefono'); // <-- CAMPO NUEVO AGREGADO
                    echo $this->Form->control('correo');
                    echo $this->Form->control('password', ['type' => 'password', 'label' => 'Contraseña']);
                    echo $this->Form->control('language', [
                'type' => 'select',
                'options' => ['es' => 'es', 'en' => 'en'],
                'label' => __('Idioma'),
                'empty' => false
            ]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('GUARDAR USUARIO')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>