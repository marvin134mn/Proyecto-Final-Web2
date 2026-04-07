<?php
declare(strict_types=1);

/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link      https://cakephp.org CakePHP(tm) Project
 * @since     0.2.9
 * @license   https://opensource.org/licenses/mit-license.php MIT License
 */
namespace App\Controller;

use Cake\Controller\Controller;
use Cake\Event\EventInterface; // IMPORTANTE: Añadir esto

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @link https://book.cakephp.org/5/en/controllers.html#the-app-controller
 */
class AppController extends Controller
{
    /**
     * Initialization hook method.
     *
     * Use this method to add common initialization code like loading components.
     *
     * e.g. `$this->loadComponent('FormProtection');`
     *
     * @return void
     */
    public function initialize(): void
    {
        parent::initialize();

        $this->loadComponent('Flash');

        /*
         * Enable the following component for recommended CakePHP form protection settings.
         * see https://book.cakephp.org/5/en/controllers/components/form-protection.html
         */
        //$this->loadComponent('FormProtection');
    }
    public function beforeFilter(\Cake\Event\EventInterface $event)
{
    parent::beforeFilter($event);

    // 1. Detectamos en qué página estamos
    $controller = $this->request->getParam('controller');
    $action = $this->request->getParam('action');

    // 2. LÓGICA PARA EL LOGIN (Botones manuales)
    if ($controller === 'Users' && $action === 'login') {
        
        $lang = $this->request->getQuery('lang'); // Captura el ?lang=es o ?lang=en de los botones
        
        if ($lang) {
            \Cake\I18n\I18n::setLocale($lang);
            $this->getRequest()->getSession()->write('Config.language', $lang);
        } else {
            // Si no presionó nada, intenta mantener lo que ya estaba en la sesión del login
            $sessionLang = $this->getRequest()->getSession()->read('Config.language');
            if ($sessionLang) {
                \Cake\I18n\I18n::setLocale($sessionLang);
            }
        }
    } 
    // 3. LÓGICA PARA TODO LO DEMÁS (Base de Datos)
    else {
        if (isset($this->Authentication) && $this->Authentication->getResult()->isValid()) {
            $user = $this->Authentication->getIdentity();
            
            // Usamos la columna 'languaje' de tu SQL Server
            if (!empty($user->languaje)) {
                \Cake\I18n\I18n::setLocale($user->languaje);
            }
        }
    }
}
}
