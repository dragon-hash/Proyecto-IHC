<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ReplacementsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ReplacementsTable Test Case
 */
class ReplacementsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\ReplacementsTable
     */
    public $Replacements;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.Replacements',
        'app.Categories',
        'app.Details'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Replacements') ? [] : ['className' => ReplacementsTable::class];
        $this->Replacements = TableRegistry::getTableLocator()->get('Replacements', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Replacements);

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
