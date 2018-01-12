<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AsteriskTable extends Model
{
    protected $table = 'AsteriskTable';
    public $primaryKey = 'ID';
    protected $fillable = ['ProxyIP', 'Port', 'ManagerUsername', 'ManagerPassword', 'ManagerPort', 'Queue'];
    public $timestamps = false;
}
