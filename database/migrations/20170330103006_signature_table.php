<?php

use Phinx\Migration\AbstractMigration;

/**
 * Class SignatureTable
 */
class SignatureTable extends AbstractMigration
{
    /**
     * Add the migration.
     */
    public function up()
    {
        $table = $this->table('signatures', ['id' => true, 'primary_key' => 'id']);
        $table->addColumn('publish', ['limit' => 60]);
        $table->addColumn('name', ['limit' => 20]);
        $table->addColumn('email', ['limit' => 100]);
        $table->addColumn('city', ['limit' => 120]);
        $table->addColumn('country', ['limit' => 4]);
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
        $this->dropTable('signatures');
    }
}
