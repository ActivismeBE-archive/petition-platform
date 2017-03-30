<?php

use Phinx\Migration\AbstractMigration;

/**
 * Class CategoriesTable
 */
class CategoriesTable extends AbstractMigration
{
    /**
     * Add the database migration.
     */
    public function up()
    {
        $table = $this->table('categories', ['id' => true, 'primary_key' => 'id']);
        $table->addColumn('category_module', 'string', ['limit' => 60]);
        $table->addColumn('category_name', 'string', ['limit' => 255]);
        $table->addColumn('category_description', 'text');
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
        $this->dropTable('categories');
    }
}
