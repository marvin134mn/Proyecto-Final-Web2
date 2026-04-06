<?php
namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;

class CiudadesTable extends Table
{
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('ciudades');
        $this->setDisplayField('nombre');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp'); // Para que llene created y modified solo
    }

    public function validationDefault(Validator $validator): Validator
    {
        $validator
            ->scalar('nombre')
            ->notEmptyString('nombre');

        $validator
            ->scalar('pais')
            ->notEmptyString('pais');

        $validator
            ->integer('poblacion')
            ->notEmptyString('poblacion');

        return $validator;
    }
}