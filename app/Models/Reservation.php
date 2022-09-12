<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;



class Reservation extends Model
{
    use HasFactory;
    protected $guarded = [];

    public $timestamps = false;
    protected $dates = [
        'start_date',
        'end_date',
    ];

    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }

    public function session()
    {
        return $this->belongsTo(Sessions::class,'session_id');
    }

    public function setStartAttribute($value) {
        $this->attributes['start_date'] = (new Carbon($value))->format('');
    }
}
