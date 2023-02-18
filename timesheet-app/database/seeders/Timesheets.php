<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Timesheets extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('timesheets')->insert([
            'diff_work' => 'viet lai auth',
            'plan_work' => 'Viet lai auth login',
            
            'user_id' => '1'
        ]);
    }
}
