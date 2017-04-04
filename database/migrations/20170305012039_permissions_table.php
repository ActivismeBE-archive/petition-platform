<?php

use Phinx\Migration\AbstractMigration;

/**
 * Class PermissionsTable
 */
class PermissionsTable extends AbstractMigration
{
    /**
     * Add the migration.
     */
    public function up()
	{
        $table = $this->table('permissions', ['id' => true, 'primary_key' => 'id']);
        $table->addColumn('name', 'string', ['limit' => 255]);
        $table->addColumn('description', 'text');
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
        $this->table('permissions');
	}
}
