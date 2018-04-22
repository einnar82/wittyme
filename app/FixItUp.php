<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FixItUp extends Model
{
    protected $table = 'fixitup';
    protected $fillable = [
      'jumbled', 'answer', 'explanation'
    ];
}
