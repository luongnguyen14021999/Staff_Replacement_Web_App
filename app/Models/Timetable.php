<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Timetable extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $fillable = [
        'timetable_id',
        'session',
        'unit_code_id',
        'activity_id',
        'day',
        'campus',
        'start_time',
        'location',
        'hrs_per_week',
        'staff_id',

    ];
    public $timestamps = false;

    public function staff()
    {
        return $this->hasOne(Staff::class, 'id', 'staff_id');
    }

    public function unit()
    {
        return $this->hasOne(Unit::class, 'id', 'unit_code_id');
    }
}
