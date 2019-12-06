<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\MechanicsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\MechanicsTable Test Case
 */
class MechanicsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\MechanicsTable
     */
    public $Mechanics;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.Mechanics',
        'app.Services',
        'app.Cars'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Mechanics') ? [] : ['className' => MechanicsTable::class];
        $this->Mechanics = TableRegistry::getTableLocator()->get('Mechanics', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Mechanics);

        parent::tearDown();
    }

    /**
     * Test initialize method
     *
     * @return void
     */
    public function testInitialize()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
