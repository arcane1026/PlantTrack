<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\EmployeeInvitesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\EmployeeInvitesTable Test Case
 */
class EmployeeInvitesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\EmployeeInvitesTable
     */
    public $EmployeeInvites;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.EmployeeInvites',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('EmployeeInvites') ? [] : ['className' => EmployeeInvitesTable::class];
        $this->EmployeeInvites = TableRegistry::getTableLocator()->get('EmployeeInvites', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->EmployeeInvites);

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
