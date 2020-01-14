<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\AccessLogTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\AccessLogTable Test Case
 */
class AccessLogTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\AccessLogTable
     */
    public $AccessLog;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.AccessLog',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('AccessLog') ? [] : ['className' => AccessLogTable::class];
        $this->AccessLog = TableRegistry::getTableLocator()->get('AccessLog', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->AccessLog);

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
