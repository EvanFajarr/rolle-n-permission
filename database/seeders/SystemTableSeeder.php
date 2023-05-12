<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SystemTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('system')->insert([
            'name' => 'Admin',
            'ordering' => '0',
            'description' => 'Administrator',
        ]);
        
        DB::table('system')->insert([
            'name' => 'Website',
            'ordering' => '1',
            'description' => 'Website',
        ]);
    }
}
