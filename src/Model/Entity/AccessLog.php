<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * AccessLog Entity
 *
 * @property int $id
 * @property string $username
 * @property string|null $password
 * @property string|null $ip_address
 * @property bool $result
 * @property \Cake\I18n\FrozenTime|null $created
 */
class AccessLog extends Entity
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
        'username' => true,
        'password' => true,
        'ip_address' => true,
        'result' => true,
        'created' => true,
    ];

    /**
     * Fields that are excluded from JSON versions of the entity.
     *
     * @var array
     */
    protected $_hidden = [
        'password',
    ];
}
