<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Portfolio extends Model
{
    protected  $fillable = ['name', 'images', 'filter', 'text'];
}
