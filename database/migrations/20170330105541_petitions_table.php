<?php

use Phinx\Migration\AbstractMigration;

/**
 * Class PetitionsTable
 */
class PetitionsTable extends AbstractMigration
{
    /**
     * Add the database migration.
     */
    public function up()
    {
        $table = $this->table('petitions', ['id' => true, 'primary_key' => 'id']);
        $table->addColumn('creator_id', 'integer');
        $table->addColumn('category_id', 'integer');
        $table->addColumn('title', 'string', ['limit' => 255]);
        $table->addColumn('description', 'text');
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
        $this->dropTable('petitions');
    }
}
