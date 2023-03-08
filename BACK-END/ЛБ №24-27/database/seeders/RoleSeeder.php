<?php

namespace Database\Seeders;

use App\Enums\RoleEnum;
use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Role::query()
            ->insert(
                array_map(fn ($res) => [
                    'id' => $res->value,
                    'title' => $res->title()
                ], RoleEnum::cases())
            );
    }
}
