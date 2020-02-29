<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\GrowthProfilesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\GrowthProfilesTable Test Case
 */
class GrowthProfilesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\GrowthProfilesTable
     */
    public $GrowthProfiles;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.GrowthProfiles',
        'app.Users',
        'app.Businesses',
        'app.Plants',
        'app.Batches',
        'app.Stages',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('GrowthProfiles') ? [] : ['className' => GrowthProfilesTable::class];
        $this->GrowthProfiles = TableRegistry::getTableLocator()->get('GrowthProfiles', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->GrowthProfiles);

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
