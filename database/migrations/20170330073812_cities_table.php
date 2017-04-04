<?php

use Phinx\Migration\AbstractMigration;

/**
 * Class CitiesTable
 */
class CitiesTable extends AbstractMigration
{
    /**
     * Add the migration
     */
    public function up()
    {
        $table = $this->table('cities', ['id' => true, 'primary_key' => 'id']);
        $table->addColumn('postal_code', 'integer');
        $table->addColumn('city_name', 'text');
        $table->addColumn('lat_num', 'string', ['limit' => 255]);
        $table->addColumn('lng_num', 'string', ['limit' => 255]);
        $table->addColumn('province_id', 'string');
        $table->addColumn('updated_at', 'timestamp');
        $table->addColumn('created_at', 'timestamp');
        $table->addColumn('deleted_at', 'timestamp');
        $table->create();
    }

    /**
     * Reverse the migration.
     */
    public function down()
    {
        $this->dropTable('cities');
    }
}
