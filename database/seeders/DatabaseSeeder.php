<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\User::factory()->create([
            'name' => 'Fabián Caballero',
            'email' => 'fcaballero@email.co',
            'password' => bcrypt('123456789')
        ]);
        \App\Models\Departamento::factory(10)->create();

        //crear 100 usuarios con sus empleados
        \App\Models\User::factory(100)->create()->each(function ($user) {
            \App\Models\Empleado::factory()->create([
                'user_id' => $user->id,
                'departamento_id' => random_int(1, 10),
            ]);
        });


        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
