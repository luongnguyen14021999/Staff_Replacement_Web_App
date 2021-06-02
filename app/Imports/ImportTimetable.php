<?php

namespace App\Imports;

use App\Models\Staff;
use App\Models\Timetable;
use App\Models\Unit;
use Maatwebsite\Excel\Concerns\SkipsErrors;
use Maatwebsite\Excel\Concerns\SkipsOnError;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithBatchInserts;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Throwable;

class ImportTimetable implements ToModel, WithHeadingRow, WithBatchInserts, SkipsOnError
{
    use SkipsErrors;
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        if (!isset($row['day'])) {
            return null;
        }
        $staff = Staff::where('staff_id', $row['staffid'])->first();
        if($staff === null)
        {
            return null;
        }

        $unit = Unit::where('unit_code', $row['unit_code'])->first();
        if($unit === null)
        {
            return null;
        }

        return new Timetable([
            'timetable_id'      => $row['timetableid'],
            'session'           => $row['session'],
            'activity_id'       => $row['activityid'],
            'unit_code_id'      => $unit->id,
            'day'               => $row['day'],
            'campus'            => $row['campus'],
            'start_time'        => date("H:i:s", strtotime($row['start_time'])),
            'location'          => $row['location'],
            'hrs_per_week'      => $row['hrs_per_week'],
            'staff_id'          => $staff->id,
            'position_type'     => $row['casperm'],
        ]);
    }

    public function batchSize(): int
    {
        return 2000;
    }
}
