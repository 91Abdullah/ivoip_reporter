<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AgentSettings extends Model
{
    protected $table = 'Settings';
    public $primaryKey = 'ID';

    public $timestamps = false;

    protected $fillable = ['name', 'extension'];
}
