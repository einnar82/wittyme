<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Nymrush extends Model
{
    protected $table = 'nymrush';

    protected $fillable = [
      'synonym', 'choice1', 'choice2', 'choice3', 'answer'
    ];
}
