<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ReportsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ReportsTable Test Case
 */
class ReportsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\ReportsTable
     */
    public $Reports;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.Reports',
        'app.Users',
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
        $config = TableRegistry::getTableLocator()->exists('Reports') ? [] : ['className' => ReportsTable::class];
        $this->Reports = TableRegistry::getTableLocator()->get('Reports', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Reports);

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
