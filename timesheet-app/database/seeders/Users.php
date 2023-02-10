<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class Users extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('users')->insert([
            'name' => 'Nguyen Kim Bao',
            'email' => 'bao-nguyen@dimage.co.jp',
            'password' => bcrypt('111111'),
            'role' => '1'
        ]);
    }
}
