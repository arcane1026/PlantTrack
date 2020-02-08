<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * BatchesFixture
 */
class BatchesFixture extends TestFixture
{
    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'integer', 'length' => 10, 'unsigned' => true, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'user_id' => ['type' => 'integer', 'length' => 10, 'unsigned' => true, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'growth_profile_id' => ['type' => 'integer', 'length' => 10, 'unsigned' => true, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'plant_id' => ['type' => 'integer', 'length' => 10, 'unsigned' => true, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'step_id' => ['type' => 'integer', 'length' => 10, 'unsigned' => true, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'name' => ['type' => 'string', 'length' => 30, 'null' => false, 'default' => null, 'collate' => 'latin1_swedish_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'description' => ['type' => 'string', 'length' => 100, 'null' => false, 'default' => null, 'collate' => 'latin1_swedish_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'quantity' => ['type' => 'integer', 'length' => 10, 'unsigned' => true, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'yield' => ['type' => 'float', 'length' => null, 'precision' => null, 'unsigned' => true, 'null' => true, 'default' => null, 'comment' => ''],
        'plant_date' => ['type' => 'datetime', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        'harvest_date' => ['type' => 'datetime', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        'watched' => ['type' => 'boolean', 'length' => null, 'null' => false, 'default' => '0', 'comment' => '', 'precision' => null],
        'testing_status' => ['type' => 'smallinteger', 'length' => 5, 'unsigned' => true, 'null' => false, 'default' => '0', 'comment' => '0:Unsent, 1:Sent, 2:Passed, 3:Failed', 'precision' => null],
        'testing_date' => ['type' => 'datetime', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        'resource_path' => ['type' => 'string', 'length' => 255, 'null' => true, 'default' => null, 'collate' => 'latin1_swedish_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'created' => ['type' => 'datetime', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        'modified' => ['type' => 'datetime', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        '_indexes' => [
            'user_key_batches' => ['type' => 'index', 'columns' => ['user_id'], 'length' => []],
            'growth_profile_key_batches' => ['type' => 'index', 'columns' => ['growth_profile_id'], 'length' => []],
            'plant_key_batches' => ['type' => 'index', 'columns' => ['plant_id'], 'length' => []],
            'step_key_batches' => ['type' => 'index', 'columns' => ['step_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
            'batches_ibfk_1' => ['type' => 'foreign', 'columns' => ['user_id'], 'references' => ['users', 'id'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
            'batches_ibfk_2' => ['type' => 'foreign', 'columns' => ['growth_profile_id'], 'references' => ['growth_profiles', 'id'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
            'batches_ibfk_3' => ['type' => 'foreign', 'columns' => ['plant_id'], 'references' => ['plants', 'id'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
            'batches_ibfk_4' => ['type' => 'foreign', 'columns' => ['step_id'], 'references' => ['steps', 'id'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
        ],
        '_options' => [
            'engine' => 'InnoDB',
            'collation' => 'latin1_swedish_ci'
        ],
    ];
    // @codingStandardsIgnoreEnd
    /**
     * Init method
     *
     * @return void
     */
    public function init()
    {
        $this->records = [
            [
                'id' => 1,
                'user_id' => 1,
                'growth_profile_id' => 1,
                'plant_id' => 1,
                'step_id' => 1,
                'name' => 'Lorem ipsum dolor sit amet',
                'description' => 'Lorem ipsum dolor sit amet',
                'quantity' => 1,
                'yield' => 1,
                'plant_date' => '2020-02-08 01:46:05',
                'harvest_date' => '2020-02-08 01:46:05',
                'watched' => 1,
                'testing_status' => 1,
                'testing_date' => '2020-02-08 01:46:05',
                'resource_path' => 'Lorem ipsum dolor sit amet',
                'created' => '2020-02-08 01:46:05',
                'modified' => '2020-02-08 01:46:05',
            ],
        ];
        parent::init();
    }
}
