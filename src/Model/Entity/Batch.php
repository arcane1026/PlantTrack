<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Batch Entity
 *
 * @property int $id
 * @property int $user_id
 * @property int $growth_profile_id
 * @property int $plant_id
 * @property int $business_id
 * @property int|null $step_id
 * @property string $name
 * @property string $description
 * @property int $quantity
 * @property float|null $yield
 * @property \Cake\I18n\FrozenTime|null $plant_date
 * @property \Cake\I18n\FrozenTime|null $harvest_date
 * @property bool $watched
 * @property int $testing_status
 * @property \Cake\I18n\FrozenTime|null $testing_date
 * @property string|null $resource_path
 * @property \Cake\I18n\FrozenTime|null $created
 * @property \Cake\I18n\FrozenTime|null $modified
 *
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\GrowthProfile $growth_profile
 * @property \App\Model\Entity\Plant $plant
 * @property \App\Model\Entity\Business $business
 * @property \App\Model\Entity\Step $step
 * @property \App\Model\Entity\Note[] $notes
 * @property \App\Model\Entity\Reading[] $readings
 * @property \App\Model\Entity\Report[] $reports
 */
class Batch extends Entity
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
        'growth_profile_id' => true,
        'plant_id' => true,
        'business_id' => true,
        'step_id' => true,
        'name' => true,
        'description' => true,
        'quantity' => true,
        'yield' => true,
        'plant_date' => true,
        'harvest_date' => true,
        'watched' => true,
        'testing_status' => true,
        'testing_date' => true,
        'resource_path' => true,
        'created' => true,
        'modified' => true,
        'user' => true,
        'growth_profile' => true,
        'plant' => true,
        'business' => true,
        'step' => true,
        'notes' => true,
        'readings' => true,
        'reports' => true,
    ];
}
