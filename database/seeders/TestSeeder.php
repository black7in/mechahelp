<?php

namespace Database\Seeders;

use App\Models\Workshop;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Client;
use App\Models\Vehicle;
class TestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $user = User::create([
            'first_name' => "Adrian",
            'last_name' => "Rosales",
            'email' => "adrian@gmail.com",
            'password' => "ascent123",
            'type' => 0, // Tipo Cliente
        ]);
        $user->assignRole('Client');

        //$user->createAsStripeCustomer();

        Client::create([
            'phone' => 67580045,
            'ci' => 0,
            'user_id' => $user->id,
        ]);

        Vehicle::create([
            'client_id'=> $user->id,
            'marca' => 'Suzuki',
            'modelo'=> 'Swift',
            'año'=> '1996',
        ]);

        Vehicle::create([
            'client_id' => $user->id,
            'marca' => 'Toyota',
            'modelo' => 'Corolla',
            'año' => '1996',
        ]);

        $workshop = User::create([
            'first_name' => "Roberto",
            'last_name' => "Gonzales",
            'email' => "admin@gmail.com",
            'password' => "ascent123",
            'type' => 1, // Tipo Cliente
        ]);
        $workshop->assignRole('Workshop');

        //$workshop->createAsStripeCustomer();
        Workshop::create([
            'user_id'=> $workshop->id,
            'name'=> 'Illimani',
            'address'=> 'Av, La Guardia',
            'city'=> 'Santa Cruz',
            'slogan'=> 'Somos los Mejores',
            'nit'=> '12475224',
            'phone'=> '79714996',
            'status'=> '0'
        ]);


    }
}
