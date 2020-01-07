<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ReadingsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ReadingsTable Test Case
 */
class ReadingsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\ReadingsTable
     */
    public $Readings;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.Readings',
        'app.Steps',
        'app.Batches',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Readings') ? [] : ['className' => ReadingsTable::class];
        $this->Readings = TableRegistry::getTableLocator()->get('Readings', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Readings);

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
