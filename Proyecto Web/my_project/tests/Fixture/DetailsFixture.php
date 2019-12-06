<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * DetailsFixture
 */
class DetailsFixture extends TestFixture
{
    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => 'codigo detalle', 'autoIncrement' => true, 'precision' => null],
        'facture_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => 'codigo de la factura', 'precision' => null, 'autoIncrement' => null],
        'replacement_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => 'codigo del repuesto', 'precision' => null, 'autoIncrement' => null],
        'amount' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => 'cantidad de repuestos requeridos', 'precision' => null, 'autoIncrement' => null],
        'unit_price' => ['type' => 'decimal', 'length' => 10, 'precision' => 2, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => 'precio unitario de cada repuesto adquirido'],
        'price_total' => ['type' => 'decimal', 'length' => 10, 'precision' => 2, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => 'precio total de la factura'],
        'created' => ['type' => 'datetime', 'length' => null, 'null' => false, 'default' => null, 'comment' => 'Fecha de Creación', 'precision' => null],
        'modified' => ['type' => 'datetime', 'length' => null, 'null' => false, 'default' => null, 'comment' => 'Fecha de Modificación', 'precision' => null],
        '_indexes' => [
            'facture_id' => ['type' => 'index', 'columns' => ['facture_id'], 'length' => []],
            'replacement_id' => ['type' => 'index', 'columns' => ['replacement_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
            'details_ibfk_2' => ['type' => 'foreign', 'columns' => ['facture_id'], 'references' => ['factures', 'id'], 'update' => 'cascade', 'delete' => 'cascade', 'length' => []],
            'details_ibfk_3' => ['type' => 'foreign', 'columns' => ['replacement_id'], 'references' => ['replacements', 'id'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
        ],
        '_options' => [
            'engine' => 'InnoDB',
            'collation' => 'latin1_swedish_ci'
        ],
    ];
    // @codingStandardsIgnoreEnd
    /**
     * Init method
     *
     * @return void
     */
    public function init()
    {
        $this->records = [
            [
                'id' => 1,
                'facture_id' => 1,
                'replacement_id' => 1,
                'amount' => 1,
                'unit_price' => 1.5,
                'price_total' => 1.5,
                'created' => '2019-06-08 00:27:17',
                'modified' => '2019-06-08 00:27:17'
            ],
        ];
        parent::init();
    }
}
