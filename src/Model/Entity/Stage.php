<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Stage Entity
 *
 * @property int $id
 * @property int $growth_profile_id
 * @property string $name
 * @property string $description
 * @property \Cake\I18n\FrozenTime|null $created
 * @property \Cake\I18n\FrozenTime|null $modified
 *
 * @property \App\Model\Entity\GrowthProfile $growth_profile
 * @property \App\Model\Entity\Step[] $steps
 */
class Stage extends Entity
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
        'growth_profile_id' => true,
        'name' => true,
        'description' => true,
        'created' => true,
        'modified' => true,
        'growth_profile' => true,
        'steps' => true,
    ];

    /**
     * @return string
     */
    protected function _getDuration()
    {
        return array_sum(array_column($this->steps ?? [], 'duration')); // Return sum of duration fields of stage's steps
    }
}
