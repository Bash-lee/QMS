<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StationTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('stations')->insert([
            [
                'station_name_th' => 'medical examination room'
            ], [
                'station_name_th' => 'Pediatric examination room (children)'
            ], [
                'station_name_th' => 'surgery examination room'
            ]
        ]);
    }
}
