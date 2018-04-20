<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photoword extends Model
{
    protected $table = 'photoword';

    protected $fillable = [
      'image_question', 'choice1','choice2','choice3','answer'
    ];
}
