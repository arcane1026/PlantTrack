<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Batches Model
 *
 * @property \App\Model\Table\UsersTable&\Cake\ORM\Association\BelongsTo $Users
 * @property \App\Model\Table\GrowthProfilesTable&\Cake\ORM\Association\BelongsTo $GrowthProfiles
 * @property \App\Model\Table\PlantsTable&\Cake\ORM\Association\BelongsTo $Plants
 * @property \App\Model\Table\StepsTable&\Cake\ORM\Association\BelongsTo $Steps
 * @property \App\Model\Table\NotesTable&\Cake\ORM\Association\HasMany $Notes
 * @property \App\Model\Table\ReadingsTable&\Cake\ORM\Association\HasMany $Readings
 * @property \App\Model\Table\ReportsTable&\Cake\ORM\Association\HasMany $Reports
 *
 * @method \App\Model\Entity\Batch get($primaryKey, $options = [])
 * @method \App\Model\Entity\Batch newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Batch[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Batch|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Batch saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Batch patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Batch[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Batch findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class BatchesTable extends Table
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

        $this->setTable('batches');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('GrowthProfiles', [
            'foreignKey' => 'growth_profile_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('Plants', [
            'foreignKey' => 'plant_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('Steps', [
            'foreignKey' => 'step_id',
            'joinType' => 'INNER',
        ]);
        $this->hasMany('Notes', [
            'foreignKey' => 'batch_id',
        ]);
        $this->hasMany('Readings', [
            'foreignKey' => 'batch_id',
        ]);
        $this->hasMany('Reports', [
            'foreignKey' => 'batch_id',
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
            ->nonNegativeInteger('quantity')
            ->requirePresence('quantity', 'create')
            ->notEmptyString('quantity');

        $validator
            ->numeric('yield')
            ->greaterThanOrEqual('yield', 0)
            ->allowEmptyString('yield');

        $validator
            ->dateTime('plant_date')
            ->allowEmptyDateTime('plant_date');

        $validator
            ->dateTime('harvest_date')
            ->allowEmptyDateTime('harvest_date');

        $validator
            ->boolean('watched')
            ->notEmptyString('watched');

        $validator
            ->notEmptyString('testing_status');

        $validator
            ->dateTime('testing_date')
            ->allowEmptyDateTime('testing_date');

        $validator
            ->scalar('resource_path')
            ->maxLength('resource_path', 255)
            ->allowEmptyString('resource_path');

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
        $rules->add($rules->existsIn(['user_id'], 'Users'));
        $rules->add($rules->existsIn(['growth_profile_id'], 'GrowthProfiles'));
        $rules->add($rules->existsIn(['plant_id'], 'Plants'));
        $rules->add($rules->existsIn(['step_id'], 'Steps'));

        return $rules;
    }
}
