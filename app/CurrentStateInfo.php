<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CurrentStateInfo extends Model
{
    protected $table = 'CurrStateInfo';
    public $primaryKey = 'ID';

    public $timestamps = false;

    protected $fillable = ['Name', 'Extension', 'ACW'];
}
