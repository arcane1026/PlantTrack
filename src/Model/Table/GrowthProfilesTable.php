<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * GrowthProfiles Model
 *
 * @property \App\Model\Table\UsersTable&\Cake\ORM\Association\BelongsTo $Users
 * @property \App\Model\Table\BusinessesTable&\Cake\ORM\Association\BelongsTo $Businesses
 * @property \App\Model\Table\PlantsTable&\Cake\ORM\Association\BelongsTo $Plants
 * @property \App\Model\Table\BatchesTable&\Cake\ORM\Association\HasMany $Batches
 * @property \App\Model\Table\StagesTable&\Cake\ORM\Association\HasMany $Stages
 *
 * @method \App\Model\Entity\GrowthProfile get($primaryKey, $options = [])
 * @method \App\Model\Entity\GrowthProfile newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\GrowthProfile[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\GrowthProfile|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\GrowthProfile saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\GrowthProfile patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\GrowthProfile[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\GrowthProfile findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class GrowthProfilesTable extends Table
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

        $this->setTable('growth_profiles');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('Businesses', [
            'foreignKey' => 'business_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('Plants', [
            'foreignKey' => 'plant_id',
        ]);
        $this->hasMany('Batches', [
            'foreignKey' => 'growth_profile_id',
        ]);
        $this->hasMany('Stages', [
            'foreignKey' => 'growth_profile_id',
            'dependent' => true,
            'cascadeCallbacks' => true,
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
        $rules->add($rules->existsIn(['business_id'], 'Businesses'));
        $rules->add($rules->existsIn(['plant_id'], 'Plants'));

        return $rules;
    }
}
