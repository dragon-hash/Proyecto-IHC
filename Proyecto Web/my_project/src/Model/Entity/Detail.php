<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Detail Entity
 *
 * @property int $id
 * @property int $facture_id
 * @property int $replacement_id
 * @property int $amount
 * @property float $unit_price
 * @property float $price_total
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\Facture $facture
 * @property \App\Model\Entity\Replacement $replacement
 */
class Detail extends Entity
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
        'facture_id' => true,
        'replacement_id' => true,
        'amount' => true,
        'unit_price' => true,
        'price_total' => true,
        'created' => true,
        'modified' => true,
        'facture' => true,
        'replacement' => true
    ];
}
