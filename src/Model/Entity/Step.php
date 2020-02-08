<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Step Entity
 *
 * @property int $id
 * @property int $stage_id
 * @property string $name
 * @property string $description
 * @property int $duration
 * @property \Cake\I18n\FrozenTime|null $created
 * @property \Cake\I18n\FrozenTime|null $modified
 *
 * @property \App\Model\Entity\Stage $stage
 * @property \App\Model\Entity\Batch[] $batches
 * @property \App\Model\Entity\Note[] $notes
 * @property \App\Model\Entity\Reading[] $readings
 */
class Step extends Entity
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
        'stage_id' => true,
        'name' => true,
        'description' => true,
        'duration' => true,
        'created' => true,
        'modified' => true,
        'stage' => true,
        'batches' => true,
        'notes' => true,
        'readings' => true,
    ];
}
