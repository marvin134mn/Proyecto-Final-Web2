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
            <?= $this->Html->link(__('Listar Ciudades'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('Ir a Usuarios'), ['controller' => 'Users', 'action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="ciudades form content">
            <?= $this->Form->create($ciudad) ?>
            <fieldset>
                <legend><?= __('Agregar Nueva Ciudad (Núcleo Urbano)') ?></legend>
                <?php
                    echo $this->Form->control('nombre', [
                        'label' => __('Nombre de la Ciudad'),
                        'placeholder' => 'Ej: Santa Cruz de la Sierra'
                    ]);
                    echo $this->Form->control('pais', [
                        'label' => __('País'),
                        'placeholder' => 'Ej: Bolivia'
                    ]);
                    echo $this->Form->control('poblacion', [
                        'label' => __('Población Total'),
                        'type' => 'number'
                    ]);

                    // --- LOS 3 ATRIBUTOS ADICIONALES ---
                    echo $this->Form->control('clima', [
                        'label' => __('Clima Predominante'),
                        'placeholder' => 'Ej: Cálido / Tropical'
                    ]);
                    echo $this->Form->control('superficie_km2', [
                        'label' => __('Superficie (km²)'),
                        'type' => 'number',
                        'step' => '0.01'
                    ]);
                    echo $this->Form->control('altitud_msnm', [
                        'label' => __('Altitud (msnm)'),
                        'type' => 'number'
                    ]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Guardar Ciudad'), ['style' => 'background: #28a745; border: none;']) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>