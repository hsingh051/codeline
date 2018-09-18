<?php

use Illuminate\Database\Seeder;

class FilmsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
			            'name' => str_random(10),
			            'email' => str_random(10).'@gmail.com',
			            'password' => bcrypt('secret'),
			        ]);
        $user_id = DB::getPdo()->lastInsertId();

        for($i=1; $i<=3; $i++){

        	$length = 100;
			$randomString = substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, $length);

			$filmname = str_random(10);

        	DB::table('films')->insert([
           		'name' => $filmname,
           		'slug' => str_replace(" ", '_', $filmname),
            	'description' => $randomString,
            	'realease_date' => date("Y-m-d",strtotime("+".$i." days")),
            	'rating' => $i + 1,
            	'ticket_price' => rand (10,99),
            	'country' => 'India',
            	'genre' => 'Action, Comedy',
            	'photo' => '',
            ]);

            $film_id = DB::getPdo()->lastInsertId();

        	DB::table('films_comments')->insert([
           		'film_id' => $film_id,
            	'user_id' => $user_id,
            	'name' => str_random(10),
            	'comment' => $randomString
            ]);
        }
    }
}
