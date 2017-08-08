<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class QueueLog extends Model
{
    protected $table = 'queue_log';

    public function cdr()
    {
        return $this->belongsTo('App\CallDetailRecord', 'callid', 'uniqueid');
    }
}
