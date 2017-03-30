<?php

use Phinx\Migration\AbstractMigration;

class UsersTable extends AbstractMigration
{
    /**
     * Add the migration.
     */
	public function up()
	{
        $table = $this->table('users', ['id' => true, 'primary_key' => 'id']);
        $table->addColumn('ban_id', 'integer');
        $table->addColumn('username', 'string', ['limit' => 255]);
        $table->addColumn('name', 'string', ['limit' => 255]);
        $table->addColumn('blocked', 'string', ['limit' => 2]);
        $table->addColumn('password', 'string', ['limit' => 255]);
        $table->addColumn('email', 'string', ['limit' => 255]);
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
        $this->dropTable('users');
	}
}
