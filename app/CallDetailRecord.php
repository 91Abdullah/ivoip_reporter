<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class CallDetailRecord extends Model
{
    protected $table = 'cdr';
    public $primaryKey = 'uniqueid';

    public function getStartAttribute($value)
    {
    	return Carbon::parse($value);
    }

    public function queue_events()
    {
        return $this->hasMany('App\QueueLog', 'callid', 'uniqueid');
    }
}
