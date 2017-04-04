<?php

use Phinx\Migration\AbstractMigration;

/**
 * Class CountryTable
 */
class CountryTable extends AbstractMigration
{
    /**
     * Add the migration.
     */
    public function up()
    {
        $table = $this->table('countries', ['id' => true, 'primary_key' => 'id']);
        $table->addColumn('currency_id', 'integer');
        $table->addColumn('continent_id', 'integer');
        $table->addColumn('country_code', 'string', ['limit' => 2]);
        $table->addColumn('country_name', 'string', ['limit' => 42]);
        $table->addColumn('country_flag', 'string', ['limit' => 120]);
        $table->addColumn('fips_code', 'string', ['limit' => 2]);
        $table->addColumn('iso_num', 'string', ['limit' => 4]);
        $table->addColumn('north_num', 'string', ['limit' => 30]);
        $table->addColumn('south_num', 'string', ['limit' => 30]);
        $table->addColumn('east_num', 'string', ['limit' => 30]);
        $table->addColumn('west_num', 'string', ['limit' => 30]);
        $table->addColumn('capital_name', 'string', ['limit' => 30]);
        $table->addColumn('languages', 'string', ['limit' => 30]);
        $table->addColumn('isoAlpha3_num', 'string', ['limit' => 3]);
        $table->addColumn('geonameId', 'integer');
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
        $this->dropTable('countries');
    }
}
