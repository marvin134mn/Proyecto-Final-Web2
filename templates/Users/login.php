<?php
/**
 * @var \App\View\AppView $this
 */
?>
<div class="row" style="margin-top: 80px;">
    <div class="column column-25"></div>
    
    <div class="column column-50">
        <div class="users form content" style="
            background: #ffffff; 
            padding: 40px; 
            border-radius: 15px; 
            box-shadow: 0 10px 25px rgba(0,0,0,0.1);
            border-top: 5px solid #d33;
        ">
            <div style="text-align: right; margin-bottom: 20px; border-bottom: 1px solid #eee; padding-bottom: 10px;">
                <?= $this->Html->link('Español 🇧🇴', ['?' => ['lang' => 'es_BO']], [
                    'style' => 'color: #d33; text-decoration: none; margin-right: 15px; font-weight: bold; font-size: 0.8rem;'
                ]) ?>
                <?= $this->Html->link('English 🇺🇸', ['?' => ['lang' => 'en_US']], [
                    'style' => 'color: #d33; text-decoration: none; font-weight: bold; font-size: 0.8rem;'
                ]) ?>
            </div>

            <?= $this->Flash->render() ?>
            
            <div style="text-align: center; margin-bottom: 30px;">
                <h2 style="font-weight: 800; color: #444; margin-bottom: 5px;"><?= __('LOGIN') ?></h2>
                <p style="color: #888; font-size: 1.1rem;"><?= __('Por favor, ingresa tus credenciales') ?></p>
            </div>

            <?= $this->Form->create() ?>
            <fieldset style="border: none; padding: 0;">
                <div style="margin-bottom: 20px;">
                    <label style="font-weight: bold; color: #555; text-transform: uppercase; font-size: 0.8rem;">
                        <?= __('Correo Electrónico') ?>
                    </label>
                    <?= $this->Form->control('correo', [
                        'label' => false, 
                        'required' => true,
                        'placeholder' => 'usuario@dominio.com',
                        'style' => 'height: 50px; border-radius: 8px; border: 1px solid #ddd; padding-left: 15px; width: 100%;'
                    ]) ?>
                </div>

                <div style="margin-bottom: 30px;">
                    <label style="font-weight: bold; color: #555; text-transform: uppercase; font-size: 0.8rem;">
                        <?= __('Contraseña') ?>
                    </label>
                    <?= $this->Form->control('password', [
                        'label' => false, 
                        'type' => 'password', 
                        'required' => true,
                        'placeholder' => '••••••••',
                        'style' => 'height: 50px; border-radius: 8px; border: 1px solid #ddd; padding-left: 15px; width: 100%;'
                    ]) ?>
                </div>
            </fieldset>
            
            <div style="text-align: center;">
                <?= $this->Form->button(__('ACCEDER AL SISTEMA'), [
                    'style' => '
                        width: 100%; 
                        height: 55px; 
                        background-color: #d33; 
                        border: none; 
                        border-radius: 8px; 
                        font-weight: bold; 
                        letter-spacing: 1px;
                        color: white;
                        cursor: pointer;
                    '
                ]); ?>
            </div>
            <?= $this->Form->end() ?>
            
            <hr style="margin: 30px 0; border: 0; border-top: 1px solid #eee;">
        </div>
        
        <p style="text-align: center; margin-top: 20px; color: #aaa; font-size: 0.8rem;">
            &copy; <?= date('Y') ?> <?= __('Marvin Proyecto Final Sistemas') ?>
        </p>
    </div>

    <div class="column column-25"></div>
</div>