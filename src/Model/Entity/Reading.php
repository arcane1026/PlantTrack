<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Reading Entity
 *
 * @property int $id
 * @property int $step_id
 * @property int $batch_id
 * @property string $name
 * @property string $value
 * @property \Cake\I18n\FrozenTime|null $created
 * @property \Cake\I18n\FrozenTime|null $modified
 *
 * @property \App\Model\Entity\Step $step
 * @property \App\Model\Entity\Batch $batch
 */
class Reading extends Entity
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
        'step_id' => true,
        'batch_id' => true,
        'name' => true,
        'value' => true,
        'created' => true,
        'modified' => true,
        'step' => true,
        'batch' => true,
    ];
}
