<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\StepsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\StepsTable Test Case
 */
class StepsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\StepsTable
     */
    public $Steps;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.Steps',
        'app.Stages',
        'app.Batches',
        'app.Notes',
        'app.Readings',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Steps') ? [] : ['className' => StepsTable::class];
        $this->Steps = TableRegistry::getTableLocator()->get('Steps', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Steps);

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
