<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\User> $users
 */
?>
<div class="users index content">
    <?= $this->Html->link(__('Logout'), ['action' => 'logout'], ['class' => 'button secondary float-right', 'style' => 'margin-left: 10px; background: #d33; color: white;']) ?>
    
    <?= $this->Html->link(__('Gestionar Ciudades'), ['controller' => 'Ciudades', 'action' => 'index'], ['class' => 'button float-right', 'style' => 'background: #28a745; margin-right: 10px;']) ?>
    
    <?= $this->Html->link(__('New User'), ['action' => 'add'], ['class' => 'button float-right', 'style' => 'margin-right: 10px;']) ?>

    <h3><?= __('Administración de Usuarios Registrados') ?></h3>
    
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id', __('ID')) ?></th>
                    <th><?= $this->Paginator->sort('nombre', __('Nombre')) ?></th>
                    <th><?= $this->Paginator->sort('apellido', __('Apellido')) ?></th>
                    <th><?= $this->Paginator->sort('telefono', __('Teléfono')) ?></th>
                    <th><?= $this->Paginator->sort('correo', __('Correo')) ?></th>
                    <th><?= $this->Paginator->sort('language', __('Idioma')) ?></th>
                    <th><?= $this->Paginator->sort('created', __('Creado')) ?></th>
                    
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($users as $user): ?>
                <tr>
                    <td><?= $this->Number->format($user->id) ?></td>
                    <td><?= h($user->nombre) ?></td>
                    <td><?= h($user->apellido) ?></td>
                    <td><?= h($user->telefono) ?></td>
                    <td><?= h($user->correo) ?></td>
                    <td><span class="badge" style="background: #eee; padding: 5px; border-radius: 4px;"><?= h($user->language) ?></span></td>
                    <td><?= h($user->created) ?></td>
                    
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $user->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $user->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $user->id], ['confirm' => __('¿Eliminar a {0}?', $user->nombre)]) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
    </div>
</div>