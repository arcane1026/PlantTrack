<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Business Entity
 *
 * @property int $id
 * @property string $name
 * @property string $street
 * @property string|null $street2
 * @property string $city
 * @property string $state
 * @property string $zip
 * @property \Cake\I18n\FrozenTime|null $created
 * @property \Cake\I18n\FrozenTime|null $modified
 *
 * @property \App\Model\Entity\User[] $users
 */
class Business extends Entity
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
        'name' => true,
        'street' => true,
        'street2' => true,
        'city' => true,
        'state' => true,
        'zip' => true,
        'created' => true,
        'modified' => true,
        'users' => true,
    ];
}
