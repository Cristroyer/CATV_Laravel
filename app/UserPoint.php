<?php

namespace Catv;

use Illuminate\Database\Eloquent\Model;

class UserPoint extends Model
{
    protected $fillable = [
    	'user_rut', 'cod', 'day', 'month', 'year', 'productive_day', 'special_productive',
    ];
}
