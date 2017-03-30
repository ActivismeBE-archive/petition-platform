<?php

use Phinx\Seed\AbstractSeed;

class ProvinceTableSeeder extends AbstractSeed
{
    /**
     * Run Method.
     *
     * Write your database seeder using this method.
     *
     * More information on writing seeders is available here:
     * http://docs.phinx.org/en/latest/seeding.html
     */
    public function run()
    {
		$data = [
			// ['province_name_nl' => '', 'province_name_fr' => '', 'province_name_de' => ''],
			['province_name_nl' => 'Antwerpen', 'province_name_fr' => 'Anvers', 'province_name_de' => 'Antwerpen'],
			['province_name_nl' => 'Limburg', 'province_name_fr' => 'Limbourg', 'province_name_de' => 'Limburg'],
			['province_name_nl' => 'Oost-vlaanderen', 'province_name_fr' => 'Flandere orientale', 'province_name_de' => 'Ostflandern'],
			['province_name_nl' => 'Vlaams-Brabant', 'province_name_fr' => 'Brabant flamend', 'province_name_de' => 'Flamisch-Brabant'],
			['province_name_nl' => 'West-Vlaanderen', 'province_name_fr' => 'Flandre occidentale', 'province_name_de' => 'Westflandern'],
			['province_name_nl' => 'Henegouwen', 'province_name_fr' => 'Hainaut', 'province_name_de' => 'Hennegua'],
			['province_name_nl' => 'Luik', 'province_name_fr' => 'Liege', 'province_name_de' => 'Luttich'],
			['province_name_nl' => 'Luxemburg', 'province_name_fr' => 'Luxembourg', 'province_name_de' => 'Luxemburg'],
			['province_name_nl' => 'Namen', 'province_name_fr' => 'Namure', 'province_name_de' => 'Namure'],
			['province_name_nl' => 'Waals-Brabant', 'province_name_fr' => 'Brabant wallon', 'province_name_de' => 'Wallonisch-Brabant'],
			['province_name_nl' => 'Brussel', 'province_name_fr' => 'Bruxelles', 'province_name_de' => 'N/A'],
		];

		$cities = $this->table('provinces');
		$cities->truncate();

		$this->table('provinces')->insert($data)->save();
    }
}
