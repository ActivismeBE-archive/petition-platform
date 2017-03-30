<?php

use Phinx\Seed\AbstractSeed;

/**
 * Class CityTableSeeder
 */
class CityTableSeeder extends AbstractSeed
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
        $cities = $this->table('cities');
        $cities->truncate();

        $dataset = fopen('https://raw.githubusercontent.com/spatie/belgian-cities-geocoded/master/belgian-cities-geocoded.csv', 'r');
        $header  = true;

        while ($cities = fgetcsv($dataset, 1000, ',')) {
            if ($header) {
                $header = false;
            } else {
                $data['postal_code'] = $cities[0];
                $data['city_name']   = $cities[1];
                $data['lat_num']     = $cities[2];
                $data['lng_num']     = $cities[3];
                $data['province_id'] = $cities[4];

                $this->table('cities')->insert($data)->save();
            }
        }
    }
}
