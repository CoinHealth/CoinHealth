<?php

namespace Categories;

use Illuminate\Database\Seeder;
use App\Models\Category;

class MedicalHistoryProblems extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = "Migraines, Blood Pressure, Stroke, Cholesterol, Heart Attack, Chest Pain, Blood clots, Varicose veins, Easy bruising, Anemia, Indigestion, Frequent nausea or vomiting, Colitis, Diarrhea, Constipation, Bloody or black bowel movements, Hepatitis, Liver, Gallbladder, Incontinence (urine or feces), Breasts, Endometriosis, Infertility, Cancer, Diabetes, Thyroid, Asthma, Arthritis, Muscle or joint pain, Back pain, Seizures, Eyesight, Mascular degeneration, Cataracts, Depression, Anxiety, Stress, Fatigue, Sleeping, Dizziness, Mood swings, Suicidal thoughts, Teeth or gums, Hair loss or growth, Skin, Frequent falling, Weight loss or gain, broken bones";
        $problems = explode(",", $data);

        $i = 0;
        $categCode = '00017';

        foreach ($problems as $problem) {
            $i++;
            $code = str_pad((string) $i, 5, '0', STR_PAD_LEFT);
            Category::create([
                'category_code' => $categCode.$code,
                'category_desc' => 'Medical History',
                'title' => $problem,
            ]);
        }
    }
}
