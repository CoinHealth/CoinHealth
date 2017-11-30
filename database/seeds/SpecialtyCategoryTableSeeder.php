<?php

use Illuminate\Database\Seeder;
use App\Models\Category;

class SpecialtyCategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $val = [
            'Advanced Practice Midwife',
            'Aesthetic Medicine',
            'Aesthetician',
            'Allergist / Immunologist',
            'Anesthesiologist',
            'Cardiac Electrophysiologist',
            'Cardiologist',
            'Cardiothoracic Surgeon',
            'Child / Adolescent Psychiatry',
            'Clinical Social Worker',
            'Colorectal Surgeon',
            'Correactology',
            'Cosmetic Medicine',
            'Counselor Mental Health',
            'Counselor Professional',
            'Counselor',
            'Dentist',
            'Diabetology',
            'Diagnostic Medical Sonographer',
            'Dietitian, Registered',
            'Ear-Nose-Throat Specialist (ENT)',
            'Emergency Medicine Physician',
            'Endocrinologist',
            'Endodontist',
            'Epidemiologist',
            'Family Practitioner',
            'Gastroenterologist',
            'General Surgeon',
            'Geneticist',
            'Geriatrician',
            'Gerontologist',
            'Gynecologist (no OB)',
            'Gynecologic Oncologist',
            'Hand Surgeon',
            'Hematologist',
            'Home Care',
            'Hospitalist',
            'Infectious Disease Specialist',
            'Integrative and Functional Medicine',
            'Integrative Medicine',
            'Internist',
            'Laboratory Medicine Specialist',
            'Laser Surgery',
            'Massage Therapist',
            'Naturopathic Physician',
            'Nephrologist',
            'Neurologist',
            'Neuropsychology',
            'Neurosurgeon',
            'Not Actively Practicing',
            'Nuclear Medicine Specialist',
            'Nurse Practitioner',
            'Nursing',
            'Nutritionist',
            'Occupational Medicine',
            'Occupational Therapist',
            'Oncologist',
            'Ophthalmologist',
            'Optometrist',
            'Oral Surgeon',
            'Orofacial Pain',
            'Orthodontist',
            'Orthopedic Surgeon',
            'Other',
            'Pain Management Specialist',
            'Pathologist',
            'Pediatric Dentist',
            'Pediatric Gastroenterology',
            'Pediatric Surgeon',
            'Pediatrician',
            'Perinatologist',
            'Periodontist',
            'Physical Therapist',
            'Physician Assistant',
            'Plastic Surgeon',
            'Podiatrist',
            'Preventive-Aging Medicine',
            'Preventive Medicine / Occupational Medicine',
            'Primary Care Physician',
            'Prosthetist',
            'Prosthodontist',
            'Psychologist',
            'Public Health Professional',
            'Pulmonologist',
            'Radiation Oncologist',
            'Radiologist',
            'Registered Nurse',
            'Religious Non-medical Practitioner',
            'Rheumatologist',
            'Sleep Medicine',
            'Speech-Language Pathologist',
            'Sports Medicine Specialist',
            'Urologist',
            'Urgent Care',
            'Vascular Surgeon',
        ];
        $index = 1;

        foreach($val as $v) {
            $pad = str_pad($index, 5, '0', STR_PAD_LEFT);
            Category::create([
                'category_code' => '00008'.$pad,
                'category_desc' => 'Specializations',
                'title' => $v,
                'value' => $index,
            ]);

            $index++;
        }
    }
}
