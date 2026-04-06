<?php
/**
 * @var \App\View\AppView $this
 * @var \Cake\Datasource\EntityInterface $ciudad
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Acciones') ?></h4>
            <?= $this->Form->postLink(
                __('Eliminar Ciudad'),
                ['action' => 'delete', $ciudad->id],
                ['confirm' => __('¿Realmente desea eliminar la ciudad {0}?', $ciudad->nombre), 'class' => 'side-nav-item', 'style' => 'color: #d33;']
            ) ?>
            <?= $this->Html->link(__('Volver al Listado'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="ciudades form content">
            <?= $this->Form->create($ciudad) ?>
            <fieldset>
                <legend><?= __('Editar Información de la Ciudad') ?></legend>
                <?php
                    echo $this->Form->control('nombre', ['label' => __('Nombre de la Ciudad')]);
                    echo $this->Form->control('pais', ['label' => __('País')]);
                    echo $this->Form->control('poblacion', ['label' => __('Población Total')]);

                    // LOS 3 ATRIBUTOS ADICIONALES (Se cargarán con lo que ya guardaste)
                    echo $this->Form->control('clima', ['label' => __('Clima Predominante')]);
                    echo $this->Form->control('superficie_km2', ['label' => __('Superficie (km²)'), 'step' => '0.01']);
                    echo $this->Form->control('altitud_msnm', ['label' => __('Altitud (msnm)')]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Actualizar Cambios'), ['style' => 'background: #007bff; border: none;']) ?>
            <?= $this->Html->link(__('Cancelar'), ['action' => 'index'], ['class' => 'button secondary', 'style' => 'margin-left: 10px;']) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>