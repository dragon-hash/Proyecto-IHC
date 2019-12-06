<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Mechanics Model
 *
 * @property \App\Model\Table\ServicesTable|\Cake\ORM\Association\BelongsTo $Services
 * @property \App\Model\Table\CarsTable|\Cake\ORM\Association\BelongsToMany $Cars
 *
 * @method \App\Model\Entity\Mechanic get($primaryKey, $options = [])
 * @method \App\Model\Entity\Mechanic newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Mechanic[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Mechanic|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Mechanic saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Mechanic patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Mechanic[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Mechanic findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class MechanicsTable extends Table
{
    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('mechanics');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Services', [
            'foreignKey' => 'service_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsToMany('Cars', [
            'foreignKey' => 'mechanic_id',
            'targetForeignKey' => 'car_id',
            'joinTable' => 'cars_mechanics'
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->integer('id')
            ->allowEmptyString('id', 'create');

        $validator
            ->scalar('name')
            ->maxLength('name', 30)
            ->requirePresence('name', 'create')
            ->allowEmptyString('name', false,__('enter name please'));

        $validator
            ->scalar('surname')
            ->maxLength('surname', 30)
            ->requirePresence('surname', 'create')
            ->allowEmptyString('surname', false,__('enter surname please'));

        $validator
            ->decimal('salary')
            ->requirePresence('salary', 'create')
            ->allowEmptyString('salary', false,__('enter salary please'));

        $validator
            ->scalar('address')
            ->maxLength('address', 30)
            ->requirePresence('address', 'create')
            ->allowEmptyString('address', false,__('enter address please'));

        $validator
            ->scalar('phone')
            ->maxLength('phone', 9)
            ->requirePresence('phone', 'create')
            ->allowEmptyString('phone', false,__('enter phone number please'));

        $validator
            ->boolean('status')
            ->allowEmptyString('status');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->existsIn(['service_id'], 'Services'));

        return $rules;
    }
}
