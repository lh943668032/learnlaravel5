<?php

use Illuminate\Database\Seeder;

class SystemVersionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('system_versions')->delete();

        for ($i=0; $i < 100; $i++) {
            \App\SystemVersion::create([
                'branch'   => 'Branch'.$i,
                'version'    => 1,
                'user_id' => 1,
            ]);
        }
    }
}
