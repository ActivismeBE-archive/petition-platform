<?php

use Phinx\Migration\AbstractMigration;

/**
 * Class ContinentsTable
 */
class ContinentsTable extends AbstractMigration
{
    /**
     * Add the database migration.
     */
    public function up()
    {
        $table = $this->table('continents', ['id' => true, 'primary_key' => 'id']);
        $table->addColumn('continent_code', 'string', ['limit' => 4]);
        $table->addColumn('continent_name', 'string', ['limit' => 30]);
        $table->addColumn('updated_at', 'timestamp');
        $table->addColumn('created_at', 'timestamp');
        $table->addColumn('deleted_at', 'timestamp');
        $table->create();
    }

    /**
     * Reverse the database migration.
     */
    public function down()
    {
        $this->dropTable('continents');
    }
}
