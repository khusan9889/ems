<?php

namespace Database\Seeders;

use App\Models\Department;
use Illuminate\Database\Seeder;

class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Department::updateOrCreate([
            'id' => 1,
        ], [
            'branch_id' => 1,
            'name' => 'Департмент (тестовой)'
        ]);
    }
}
