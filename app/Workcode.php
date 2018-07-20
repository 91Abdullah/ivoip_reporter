<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Workcode extends Model
{
    protected $table = 'Workcodes';

    public $primaryKey = 'ID';

    public $timestamps = false;

    protected $fillable = ['WORKCODE'];
}
