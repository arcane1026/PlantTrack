<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Plant Entity
 *
 * @property int $id
 * @property int $user_id
 * @property string $name
 * @property string $description
 * @property string|null $resource_path
 * @property \Cake\I18n\FrozenTime|null $created
 * @property \Cake\I18n\FrozenTime|null $modified
 *
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\Batch[] $batches
 * @property \App\Model\Entity\GrowthProfile[] $growth_profiles
 */
class Plant extends Entity
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
        'name' => true,
        'description' => true,
        'resource_path' => true,
        'created' => true,
        'modified' => true,
        'user' => true,
        'batches' => true,
        'growth_profiles' => true,
    ];
}
