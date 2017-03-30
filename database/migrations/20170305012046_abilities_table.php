<?php

use Phinx\Migration\AbstractMigration;

/**
 * Class AbilitiesTable
 */
class AbilitiesTable extends AbstractMigration
{
	/**
	 * Add the database migration.
	 */
    public function up()
	{
		$table = $this->table('Questions', ['id' => true, 'primary_key' => 'id']);
		$table->addColumn('name', 'string', ['limit' => 255]);
		$table->addColumn('description', 'text');
        $table->addColumn('uppdated_at', 'timestamp');
        $table->addColumn('created_at', 'timestamp');
        $table->addColumn('deleted_at', 'timestamp');
		$table->create();
	}

	/**
	 * Revert the database migration.
	 */
	public function down()
	{
    	$this->dropTable('abilities');
	}
}
