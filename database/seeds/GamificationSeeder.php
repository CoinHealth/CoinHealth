<?php

use Illuminate\Database\Seeder;
use App\Models\Gamification;

class GamificationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Gamification::truncate();

        $data = [
        	[
		    	'description' => 'For simply joining Careparrot',
		    	'points' => 1000,
        	],

        	[
		    	'description' => 'For being an active member',
		    	'points' => 300,
        	],

        	[
		    	'description' => 'For being a superb member',
		    	'points' => 500,
        	],

        	[
		    	'description' => 'For keeping your account up to date',
		    	'points' => 100,
        	],

        	[
		    	'description' => 'For contacting our Health Providers',
		    	'points' => 300,
        	],

        	[
		    	'description' => 'For contacting our support team',
		    	'points' => 300,
        	],

        ];

        foreach ($data as $key => $value) {
        	Gamification::create($value);
        }
    }
}
