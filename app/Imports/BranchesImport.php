<?php

namespace App\Imports;

use App\Models\Branch;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;

class BranchesImport implements ToCollection
{
    /**
    * @param Collection $collection
    */
    public function collection(Collection $rows)
    {
        foreach ($rows as $row) {
            // Assuming your Excel file columns are in the following order:
            $name = $row[0]; // Replace with the actual column index


            // Create a new Branch record with the extracted data
            Branch::create([
                'name' => $name,

            ]);
        }
    }
}
