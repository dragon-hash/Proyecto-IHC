<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Mechanic Entity
 *
 * @property int $id
 * @property string $name
 * @property string $surname
 * @property int $service_id
 * @property float $salary
 * @property string $address
 * @property string $phone
 * @property bool|null $status
 * @property \Cake\I18n\FrozenTime|null $created
 * @property \Cake\I18n\FrozenTime|null $modified
 *
 * @property \App\Model\Entity\Service $service
 * @property \App\Model\Entity\Car[] $cars
 */
class Mechanic extends Entity
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
        'surname' => true,
        'service_id' => true,
        'salary' => true,
        'address' => true,
        'phone' => true,
        'status' => true,
        'created' => true,
        'modified' => true,
        'service' => true,
        'cars' => true
    ];
}
