<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\BatchesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\BatchesTable Test Case
 */
class BatchesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\BatchesTable
     */
    public $Batches;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.Batches',
        'app.Users',
        'app.GrowthProfiles',
        'app.Plants',
        'app.Businesses',
        'app.Steps',
        'app.Notes',
        'app.Readings',
        'app.Reports',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Batches') ? [] : ['className' => BatchesTable::class];
        $this->Batches = TableRegistry::getTableLocator()->get('Batches', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Batches);

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
