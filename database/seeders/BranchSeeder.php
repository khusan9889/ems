<?php

namespace Database\Seeders;

use App\Imports\BranchesImport;
use App\Models\Branch;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Maatwebsite\Excel\Facades\Excel;

class BranchSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Branch::truncate();
        Excel::import(new BranchesImport, public_path('excel/branches.xlsx'));
    }
}
