<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CurrentStateInfo extends Model
{
    protected $table = 'CurrStateInfo';
    public $primaryKey = 'ID';

    protected $fillable = ['Name', 'Extension'];
}
