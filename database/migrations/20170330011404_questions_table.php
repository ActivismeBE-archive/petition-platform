<?php

use Phinx\Migration\AbstractMigration;

class QuestionsTable extends AbstractMigration
{
    /**
     * Add the migration.
     */
    public function up()
    {
        $supportQuestion = $this->table('Questions', ['id' => true, 'primary_key' => 'id']);
        $supportQuestion->addColumn('author_id', 'integer');
        $supportQuestion->addColumn('title', 'string', ['limit' => 255]);
        $supportQuestion->addColumn('description', 'text');
        $supportQuestion->addColumn('created_at', 'timestamp');
        $supportQuestion->addColumn('updated_at', 'timestamp');
        $supportQuestion->create();

        $categoryRelation = $this->table('Question_categories', ['id' => true, 'primary_key' => 'id']);
        $categoryRelation->addColumn('question_id', 'integer');
        $categoryRelation->addColumn('category_id', 'integer');
        $categoryRelation->addColumn('created_at', 'timestamp');
        $categoryRelation->addColumn('updated_at', 'timestamp');
        $categoryRelation->create();

        $commentRelation = $this->table('Question_comments', ['id' => true, 'primary_key' => 'id']);
        $commentRelation->addColumn('question_id', 'integer');
        $commentRelation->addColumn('comment_id', 'integer');
        $commentRelation->addColumn('created_at', 'timestamp');
        $commentRelation->addColumn('updated_at', 'timestamp');
        $commentRelation->create();
    }

    /**
     * Reverse the migration.
     */
    public function down()
    {
        $this->dropTable('Questions');
        $this->dropTable('Question_categories');
        $this->dropTable('Question_comments');
    }
}
