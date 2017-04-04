<?php

use Phinx\Migration\AbstractMigration;

/**
 * Class BelgianProvincesTable
 */
class BelgianProvincesTable extends AbstractMigration
{
    /**
     * Add The migration.
     */
    public function up()
    {
        $table = $this->table('provinces', ['id' => true, 'primary_key' => 'id']);
        $table->addColumn('province_name_nl', 'string', ['limit' => 60]);
        $table->addColumn('province_name_fr', 'string', ['limit' => 60]);
        $table->addColumn('province_name_de', 'string', ['limit' => 60]);
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
        $this->dropTable('provinces');
    }
}
