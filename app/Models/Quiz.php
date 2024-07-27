<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Quiz extends Model
{

    use HasFactory;
    
    protected $dates=['finished_at'];

    protected $appends = ['details'];

    public function getFinishedAttribute($date)
    {
        return $date ? Carbon::parse($date) : null;
    }

    
    public function questions()
    {
        return $this->hasMany("App\Models\Question");
    }

    public function my_result()
    {
        return $this->hasOne('App\Models\Result')->where('user_id', Auth()->user()->id);
    }

    public function results()
    {
        return $this->hasMany('App\Models\Result');
    }

    public function getDetailsAttribute()
    {
        if($this->results()->count() > 0):
        return [
            "average" => $this->results()->avg('point'),
            "join_count" => $this->results()->count()
        ];
    endif;

    return null;
    }

    public function topTen()
    {
        return $this->results()->orderByDesc('point')->limit('10');
    }
        
    

 


}

