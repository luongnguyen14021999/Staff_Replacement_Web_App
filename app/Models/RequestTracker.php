<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RequestTracker extends Model
{
    use HasFactory;
    protected $table = 'request_tracker';



    public $classData;

    protected $fillable = [
        'replacement_id',
        'staff_id',
        'accepted',
    ];

   /* public static function create()
    {
       $input = request()->all();
       RequestTracker::create($input);
       return $input;
    }

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */


    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',

    ];

    public function class(){
        return $this->hasOne(Timetable::Class);
    }

}
