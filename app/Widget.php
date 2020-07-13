<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Widget extends Model
{
    // table name
    protected $table= 'widgets';
    // no timestamps for the table
    public $timestamps = false;
    
    protected $fillable = [
        'name',
        'description'
    ];
}
