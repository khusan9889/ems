<?php

namespace Database\Seeders;

use App\Models\Branch;
use App\Models\Department;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AddDepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $branch = Branch::find(12);

        $department = new Department();
        $department->id = 17;
        $department->branch_id = 12;
        $department->name = 'Реанимация';

        $branch->departments()->save($department);
    }
}
