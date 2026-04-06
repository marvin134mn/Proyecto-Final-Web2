<?php
/**
 * @var \App\View\AppView $this
 * @var iterable $ciudades
 */
?>
<div class="ciudades index content">
    <?= $this->Html->link(__('Logout'), ['controller' => 'Users', 'action' => 'logout'], ['class' => 'button secondary float-right', 'style' => 'background: #d33; margin-left: 10px;']) ?>
    
    <?= $this->Html->link(__('Ver Usuarios'), ['controller' => 'Users', 'action' => 'index'], ['class' => 'button float-right', 'style' => 'background: #5d6d7e; margin-left: 10px;']) ?>
    
    <?= $this->Html->link(__('Nueva Ciudad'), ['action' => 'add'], ['class' => 'button float-right']) ?>

    <h3><?= __('Gestión de Ciudades (Núcleos Urbanos)') ?></h3>
    
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id', __('ID')) ?></th>
                    <th><?= $this->Paginator->sort('nombre', __('Ciudad')) ?></th>
                    <th><?= $this->Paginator->sort('pais', __('País')) ?></th>
                    <th><?= $this->Paginator->sort('poblacion', __('Población')) ?></th>
                    
                    <th><?= $this->Paginator->sort('clima', __('Clima')) ?></th>
                    <th><?= $this->Paginator->sort('superficie_km2', __('Superficie (km²)')) ?></th>
                    <th><?= $this->Paginator->sort('altitud_msnm', __('Altitud (msnm)')) ?></th>
                    
                    <th class="actions"><?= __('Acciones') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($ciudades as $ciudad): ?>
                <tr>
                    <td><?= h($ciudad->id) ?></td>
                    <td><?= h($ciudad->nombre) ?></td>
                    <td><?= h($ciudad->pais) ?></td>
                    <td><?= $this->Number->format($ciudad->poblacion) ?></td>
                    <td><?= h($ciudad->clima) ?></td>
                    <td><?= h($ciudad->superficie_km2) ?></td>
                    <td><?= h($ciudad->altitud_msnm) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('Editar'), ['action' => 'edit', $ciudad->id]) ?>
                        <?= $this->Form->postLink(__('Borrar'), ['action' => 'delete', $ciudad->id], ['confirm' => __('¿Eliminar {0}?', $ciudad->nombre)]) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
                <?php if (count($ciudades) == 0): ?>
                    <tr>
                        <td colspan="8" style="text-align: center;"><?= __('No hay ciudades registradas. Haz clic en "Nueva Ciudad".') ?></td>
                    </tr>
                <?php endif; ?>
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