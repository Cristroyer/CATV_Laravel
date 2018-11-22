<?php

use Faker\Generator as Faker;

$factory->define(Catv\UserPoint::class, function (Faker $faker) {
    return [
        'user_id' 				=> $faker->numberBetween($min = 1, $max = 20),
		'cod'					=> $faker->randomElement($array = array ('BG73','BG75','BG76', 'BG80', 'BG81', 'BG83', 'GB18')),
		'day'					=> $faker->numberBetween($min = 1, $max = 30),
		'month'					=> '10',
		'year'					=> '2018',
		'productive_day'		=> $faker->numberBetween($min = 0, $max = 1000),
		'special_productive'	=> $faker->randomElement($array = array ('Falta','Libre','Certificacion', 'Capacitacion', 'Vacaciones', 'Permiso sin Goze', 'Sin Produccion', 'Despido', '-----')),
    ];
});
