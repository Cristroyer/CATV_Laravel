<?php

use Faker\Generator as Faker;

$factory->define(Catv\UserData::class, function (Faker $faker) {
    return [
        'user_id' 		   => $faker->unique()->numberBetween($min = 1, $max = 20),
        'first_name' 	   => $faker->firstNameMale,
        'middle_name'      => $faker->firstNameFemale,   
        'last_pat_name'    => $faker->lastName,   
        'last_mat_name'    => $faker->lastName,   
        'rut'    		   => $faker->randomNumber,
        'dig'    		   => $faker->numberBetween($min = 0, $max = 11),
        'born'    		   => $faker->date($format = 'Y-m-d', $max = 'now'),
        'region'   		   => $faker->state, 
        'city'    		   => $faker->city,
        'address' 		   => $faker->address,   
        'civil_state'  	   => $faker->word,  
        'lic'    		   => $faker->randomLetter,
        'lic_exp'  	       => $faker->date($format = 'Y-m-d', $max = 'now'), 
        'particular_email' => $faker->safeEmailDomain, 
        'phone_fij'  	   => $faker->phoneNumber,  
        'phone_movil' 	   => $faker->phoneNumber,
        'prev_sal'  	   => $faker->word, 
        'prev_pen'  	   => $faker->word,  
    ];
});