<?php

use Illuminate\Database\Seeder;
use App\Models\Patient;
use Faker\Generator;

class PatientsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Patient::class, 18)->create()
            ->each(function($patient) {
                $patient->providers()
                    ->attach(97);
            });
    }
}
