<?php

namespace Database\Seeders;

use App\Models\Branch;
use App\Models\Department;
use Illuminate\Database\Seeder;

class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $branches = Branch::all();
        foreach ($branches as $index => $item) {
            Department::updateOrCreate([
                'id' => $index + 1,
            ], [
                'branch_id' => $item->id,
                'name' => 'Департмент'
            ]);
        }
    }
}
