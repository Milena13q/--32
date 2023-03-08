<?php

namespace Database\Seeders;

use App\Enums\RoleEnum;
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
        User::query()
            ->create([
                'first_name' => 'Admin',
                'last_name' => 'Admin',
                'address' => 'Политех',
                'phone' => '+375291111111',
                'email' => 'admin@admin.com',
                'password' => 'admin',
                'role_id' => RoleEnum::ADMINISTRATOR->value
            ]);
    }
}
