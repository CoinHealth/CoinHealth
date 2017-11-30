<?php namespace Categories;

use Illuminate\Database\Seeder;
use App\Models\Category;

class PatientFlagsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categs = [
            'Low',
            'Medium',
            'High',
        ];
        $index = 0;
        $start = '00016';
        foreach($categs as $categ) {
            ++$index;
            $code = $start.str_pad($index, 5, '0', STR_PAD_LEFT);
            Category::create([
                'category_desc' => 'Patient Flag',
                'category_code' => $code,
                'title' => $categ
            ]);
        }
    }
}
