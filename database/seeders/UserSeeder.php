<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'suspendido'=> '0',
            'apellido' => 'Quintana',
            'nombre' => 'Facundo',
            'username' => 'zotrix18',
            'password' => '$2y$10$vNhYi7l/.qyy5r0Iux41wO3EqOc2NukQUYTF3XLgVl0GTS0QMh0KW'
        ])->assignRole('Admin');

            
    }
}
