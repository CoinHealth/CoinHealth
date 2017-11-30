<?php

namespace Categories;

use Illuminate\Database\Seeder;
use App\Models\Category;
class SeedBloodTypeCategories extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $types = [
            "O +",
            "O -",
            "A +",
            "A -",
            "B +",
            "B -",
            "AB +",
            "AB -",
            "Not Sure",
        ];


        $i = 0;
        $categCode = '00018';

        foreach ($types as $type) {
            $i++;
            $code = str_pad((string) $i, 5, '0', STR_PAD_LEFT);
            Category::create([
                'category_code' => $categCode.$code,
                'category_desc' => 'Blood Types',
                'title' => $type,
            ]);
        }
    }
}
