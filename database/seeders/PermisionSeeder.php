<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermisionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Permission::create(['name' => 'system index']);
        Permission::create(['name' => 'create system']);
        Permission::create(['name' => 'edit system']);
        Permission::create(['name' => 'delete system']);
        Permission::create(['name' => 'module index']);
        Permission::create(['name' => 'create module']);
        Permission::create(['name' => 'edit module']);
        Permission::create(['name' => 'delete module']);
        Permission::create(['name' => 'action index']);
        Permission::create(['name' => 'create action']);
        Permission::create(['name' => 'edit action']);
        Permission::create(['name' => 'delete action']);
        Permission::create(['name' => 'permision index']);
        Permission::create(['name' => 'create permision']);
        Permission::create(['name' => 'edit permision']);
        Permission::create(['name' => 'delete permision']);
        Permission::create(['name' => 'rolle index']);
        Permission::create(['name' => 'create rolle']);
        Permission::create(['name' => 'edit rolle']);
        Permission::create(['name' => 'delete rolle']);
        Permission::create(['name' => 'create permision in rolle']);
        Permission::create(['name' => 'delete permision in rolle']);
        // Permission::create(['name' => 'user index']);
        // Permission::create(['name' => 'create user']);
        // Permission::create(['name' => 'show user']);
        // Permission::create(['name' => 'create rolle in user']);
        // Permission::create(['name' => 'delete rolle in user']);
        // Permission::create(['name' => 'create permisiion in user']);
        // Permission::create(['name' => 'delete permision in user']);
    }
}
