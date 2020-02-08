<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Steps Model
 *
 * @property \App\Model\Table\StagesTable&\Cake\ORM\Association\BelongsTo $Stages
 * @property \App\Model\Table\BatchesTable&\Cake\ORM\Association\HasMany $Batches
 * @property \App\Model\Table\NotesTable&\Cake\ORM\Association\HasMany $Notes
 * @property \App\Model\Table\ReadingsTable&\Cake\ORM\Association\HasMany $Readings
 *
 * @method \App\Model\Entity\Step get($primaryKey, $options = [])
 * @method \App\Model\Entity\Step newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Step[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Step|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Step saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Step patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Step[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Step findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class StepsTable extends Table
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

        $this->setTable('steps');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Stages', [
            'foreignKey' => 'stage_id',
            'joinType' => 'INNER',
        ]);
        $this->hasMany('Batches', [
            'foreignKey' => 'step_id',
        ]);
        $this->hasMany('Notes', [
            'foreignKey' => 'step_id',
        ]);
        $this->hasMany('Readings', [
            'foreignKey' => 'step_id',
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
            ->nonNegativeInteger('id')
            ->allowEmptyString('id', null, 'create');

        $validator
            ->scalar('name')
            ->maxLength('name', 30)
            ->requirePresence('name', 'create')
            ->notEmptyString('name');

        $validator
            ->scalar('description')
            ->maxLength('description', 100)
            ->requirePresence('description', 'create')
            ->notEmptyString('description');

        $validator
            ->nonNegativeInteger('duration')
            ->requirePresence('duration', 'create')
            ->notEmptyString('duration');

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
        $rules->add($rules->existsIn(['stage_id'], 'Stages'));

        return $rules;
    }
}
