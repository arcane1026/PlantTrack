<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * GrowthProfile Entity
 *
 * @property int $id
 * @property int $user_id
 * @property int $business_id
 * @property int|null $plant_id
 * @property string $name
 * @property string $description
 * @property \Cake\I18n\FrozenTime|null $created
 * @property \Cake\I18n\FrozenTime|null $modified
 *
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\Business $business
 * @property \App\Model\Entity\Plant $plant
 * @property \App\Model\Entity\Batch[] $batches
 * @property \App\Model\Entity\Stage[] $stages
 */
class GrowthProfile extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        'user_id' => true,
        'business_id' => true,
        'plant_id' => true,
        'name' => true,
        'description' => true,
        'created' => true,
        'modified' => true,
        'user' => true,
        'business' => true,
        'plant' => true,
        'batches' => true,
        'stages' => true,
    ];

    /**
     * @return string
     */
    protected function _getDuration()
    {
        return array_sum(array_column($this->stages, 'duration')); // Return sum of duration fields of stage's steps
    }

    /**
     * @return string
     */
    protected function _getTotalStages()
    {
        return count($this->stages); // Return sum of duration fields of stage's steps
    }
}
