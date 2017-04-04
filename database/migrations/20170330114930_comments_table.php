<?php

use Phinx\Migration\AbstractMigration;

/**
 * Class CommentsTable
 */
class CommentsTable extends AbstractMigration
{
    /**
     * Add the database migration.
     */
    public function up()
    {
        $table = $this->table('comments', ['id' => 'true', 'primary_key' => 'id']);
        $table->addColumn('comment', 'text');
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
        $this->dropTable('comments');
    }
}
