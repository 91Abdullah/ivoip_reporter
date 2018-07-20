<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Agent extends Model
{
    protected $table = 'Logins';
    public $primaryKey = 'ID';
    public $timestamps = false;

    protected $fillable = ['Name', 'Extension', 'Secret', 'SystemType', 'SystemRights', 'Queue'];
}
