<?php

use Illuminate\Database\Seeder;
use App\Models\Category;

class DoctorDegreeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $val = [

        	'AuD', 
			'DC',
			'DDS', 
			'DMD',
			'DO', 
			'DPM', 
			'DPT', 
			'DScPT', 
			'DSN', 
			'DVM',
			'ENT',
			'GP',
			'GYN',
			'MD',
			'MS',
			'OB/GYN',
			'PharmD',
			'FAAEM',
			'FAAFP',
			'FACS', 
			'FFR',
			'FRCPSC', 
			'MRCOG', 
			'MRCS',
			'DD', 
			'DEd or EdD',
			'DPA', 
			'DPH', 
			'DPhil or PhD', 
			'FFPHM', 
			'JD',
			'PhD', 
			'PSYCH', 
			'ScD', 
			'SScD', 
			'ThD', 
        ];
        $index = 1;

        foreach($val as $v) {
            $pad = str_pad($index, 5, '0', STR_PAD_LEFT);
            Category::create([
                'category_code' => '00009'.$pad,
                'category_desc' => 'Doctor Degree',
                'title' => $v,
                'value' => $index,
            ]);

            $index++;
        }
    }
}
