<?php

namespace App\Imports;

use App\Models\Staff;
use App\Models\Unit;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Concerns\WithBatchInserts;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\ToCollection;

class ImportStaff implements ToCollection, WithHeadingRow, WithBatchInserts
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function collection(Collection $rows)
    {
        Validator::make($rows->toArray(),[
            'unit_code' => 'unique:units',
            'unit_name' => 'unique:units', //DOESNT WORK YET
        ])->validate();

        foreach($rows as $row) {
            Staff::create([
                'staff_id'      => $row['staffid'],
                'first_name'    => $row['first_name'],
                'surname'       => $row['surname'],
                'email'         => $row['email'],
            ]);
            Unit::create([
                'unit_code'     => $row['unit_code'],
                'unit_name'     => $row['unit_name'],
            ]);
        }
    }

    public function batchSize(): int
    {
        return 2000;
    }
}
