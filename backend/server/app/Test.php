<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Test extends Model
{
    protected $table = 'help';
    protected $fillable = ['topic', 'seq', 'info'];    
    public $timestamps = false;
}
