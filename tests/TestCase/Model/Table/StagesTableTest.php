<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\StagesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\StagesTable Test Case
 */
class StagesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\StagesTable
     */
    public $Stages;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.Stages',
        'app.GrowthProfiles',
        'app.Steps',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Stages') ? [] : ['className' => StagesTable::class];
        $this->Stages = TableRegistry::getTableLocator()->get('Stages', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Stages);

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
