<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            RoleSeeder::class,
            UserSeeder::class,
            BranchSeeder::class,
            DepartmentSeeder::class,
            ModuleMethodSeeder::class,
            AddDepartmentSeeder::class,
            SubFilialsTableSeeder::class,
            WeekSeeder::class,
        ]);
    }
}
