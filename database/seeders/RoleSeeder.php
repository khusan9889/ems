<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'id' => 1,
                'name' => 'Админ'
            ],
            [
                'id' => 2,
                'name' => 'Оператор'
            ],
            [
                'id' => 3,
                'name' => 'Отчеты'
            ]
        ];
        foreach ($data as $item) {
            Role::updateOrCreate(['id' => $item['id']], ['name' => $item['name']]);
        }
    }
}
