<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        \App\Models\Account::factory()->create([
            'role_id' => 1,
            'gender_id' => 1,
            'first_name' => 'First',
            'last_name' => 'Admin',
            'email' => 'admin@admin.com',
            'display_picture_link' => '-',
            'password' => Hash::make('123'),
        ]);

        \App\Models\Role::factory()->create([
            'id' => 1,
            'role_name' => 'Admin'
        ]);

        \App\Models\Role::factory()->create([
            'id' => 2,
            'role_name' => 'User'
        ]);

        \App\Models\Gender::factory()->create([
            'id' => 1,
            'gender_desc' => 'Laki-laki'
        ]);

        \App\Models\Gender::factory()->create([
            'id' => 2,
            'gender_desc' => 'Perempuan'
        ]);

        \App\Models\Item::factory(15)->create();

    }
}
