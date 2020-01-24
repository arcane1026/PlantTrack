<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;
use Cake\Log\Log;

/**
 * Batch Entity
 *
 * @property int $id
 * @property int $user_id
 * @property int $growth_profile_id
 * @property int $plant_id
 * @property string $name
 * @property string $description
 * @property int $quantity
 * @property \Cake\I18n\FrozenTime|null $plant_date
 * @property \Cake\I18n\FrozenTime|null $harvest_date
 * @property bool $watched
 * @property int $testing_status
 * @property string|null $resource_path
 * @property \Cake\I18n\FrozenTime|null $created
 * @property \Cake\I18n\FrozenTime|null $modified
 *
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\GrowthProfile $growth_profile
 * @property \App\Model\Entity\Plant $plant
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
        'name' => true,
        'description' => true,
        'quantity' => true,
        'plant_date' => true,
        'harvest_date' => true,
        'watched' => true,
        'testing_status' => true,
        'resource_path' => true,
        'created' => true,
        'modified' => true,
        'user' => true,
        'growth_profile' => true,
        'plant' => true,
        'notes' => true,
        'readings' => true,
        'reports' => true,
    ];

    // Add this method
    /*
    protected function _setPlantDate($value)
    {

        $date = \DateTime::createFromFormat('m-d-Y h:i A', $value); //01-24-2020 10:53 AM
        $timeVal = strtotime($date->getTimestamp());
        var_dump($timeVal);
        //$date = date( 'Y-m-d H:i:s', $value );
        Log::write('debug', $value . ':' . $timeVal);
        return '2020-1-1 9:09'; //'2020-1-1 9:09'
    }*/
}
