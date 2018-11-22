<?php

namespace Catv;

use Illuminate\Database\Eloquent\Model;

class UserData extends Model
{
    protected $fillable = [
    	'user_rut', 'first_name', 'middle_name', 'last_pat_name', 'last_mat_name', 'born', 'region', 'city', 'address', 'civil_state', 'lic', 'lic_exp', 'particular_email', 'phone_fij', 'phone_movil', 'prev_sal', 'prev_pen', slug,
    ];
}
