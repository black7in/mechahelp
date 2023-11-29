<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;


class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //

        $role = Role::create(['name' => 'Client']);
        $role1 = Role::create(['name' => 'Workshop']);

        // Tecnico registrado por el taller
        $role2 = Role::create(['name' => 'Technician']);

        
    }
}
