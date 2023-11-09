<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\RencanaKerja;


class RencanaKerjaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $rencana_kerja = [
            ['id'=> 1,'location_code'=> '001A','mst_unit_id'=> 1,'unit_name'=> 'BSC-01','implement_id'=> 1,'implement_name'=> 'Bajak','mst_activity_id'=> 1,'activity_name'=> 'Deep Plow 50','activity_date'=> '2022-02-22','operator_name'=> 'Jajang'],
            ['id'=> 2,'location_code'=> '001B','mst_unit_id'=> 2,'unit_name'=> 'BSC-02','implement_id'=> 2,'implement_name'=> 'Chopping','mst_activity_id'=> 2,'activity_name'=> 'Deep Plow 60','activity_date'=> '2022-02-23','operator_name'=> 'Imron'],
            ['id'=> 3,'location_code'=> '001C','mst_unit_id'=> 3,'unit_name'=> 'BSC-03','implement_id'=> 3,'implement_name'=> 'Ridger','mst_activity_id'=> 3,'activity_name'=> 'Deep Plow 70','activity_date'=> '2022-02-24','operator_name'=> 'Suparman'],
            ['id'=> 4,'location_code'=> '002A','mst_unit_id'=> 4,'unit_name'=> 'BSC-04','implement_id'=> 1,'implement_name'=> 'Bajak','mst_activity_id'=> 1,'activity_name'=> 'Deep Plow 50','activity_date'=> '2022-02-25','operator_name'=> 'Adi Jaya'],
            ['id'=> 5,'location_code'=> '002B','mst_unit_id'=> 5,'unit_name'=> 'BSC-05','implement_id'=> 2,'implement_name'=> 'Chopping','mst_activity_id'=> 2,'activity_name'=> 'Deep Plow 60','activity_date'=> '2022-02-26','operator_name'=> 'Budi Utomo'],
            ['id'=> 6,'location_code'=> '002C','mst_unit_id'=> 6,'unit_name'=> 'BSC-06','implement_id'=> 3,'implement_name'=> 'Ridger','mst_activity_id'=> 3,'activity_name'=> 'Deep Plow 70','activity_date'=> '2022-02-27','operator_name'=> 'Mulyana'],
            ['id'=> 7,'location_code'=> '002D','mst_unit_id'=> 7,'unit_name'=> 'BSC-07','implement_id'=> 1,'implement_name'=> 'Bajak','mst_activity_id'=> 1,'activity_name'=> 'Deep Plow 50','activity_date'=> '2022-02-28','operator_name'=> 'Didik'],
            ['id'=> 8,'location_code'=> '003FI','mst_unit_id'=> 8,'unit_name'=> 'BSC-08','implement_id'=> 2,'implement_name'=> 'Chopping','mst_activity_id'=> 2,'activity_name'=> 'Deep Plow 60','activity_date'=> '2022-01-29','operator_name'=> 'Suyatna'],
        ];

        foreach ($rencana_kerja as $key ) {
            \App\Models\RencanaKerja::updateOrCreate(['id' => $key['id']],$key );
        }
    }
}
