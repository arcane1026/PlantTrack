<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;
use Cake\Auth\DefaultPasswordHasher;

/**
 * User Entity
 *
 * @property int $id
 * @property int|null $business_id
 * @property string $username
 * @property string $password
 * @property int $role
 * @property string $first_name
 * @property string $last_name
 * @property string $email
 * @property string $phone
 * @property string|null $resource_path
 * @property bool $confirmed
 * @property bool $locked
 * @property \Cake\I18n\FrozenTime|null $created
 * @property \Cake\I18n\FrozenTime|null $modified
 *
 * @property \App\Model\Entity\Business $business
 * @property \App\Model\Entity\Batch[] $batches
 * @property \App\Model\Entity\GrowthProfile[] $growth_profiles
 * @property \App\Model\Entity\Note[] $notes
 * @property \App\Model\Entity\Plant[] $plants
 * @property \App\Model\Entity\Report[] $reports
 */
class User extends Entity
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
        'business_id' => true,
        'username' => true,
        'password' => true,
        'role' => true,
        'first_name' => true,
        'last_name' => true,
        'email' => true,
        'phone' => true,
        'resource_path' => true,
        'confirmed' => true,
        'locked' => true,
        'created' => true,
        'modified' => true,
        'business' => true,
        'batches' => true,
        'growth_profiles' => true,
        'notes' => true,
        'plants' => true,
        'reports' => true,
    ];

    /**
     * Fields that are excluded from JSON versions of the entity.
     *
     * @var array
     */
    protected $_hidden = [
        'password',
    ];

    /**
     * Hashes the user's password when setting it in the entity.
     *
     * @param $value
     * @return mixed
     */
    protected function _setPassword($value)
    {
        if (strlen($value)) {
            $hasher = new DefaultPasswordHasher();

            return $hasher->hash($value);
        }
    }
}
