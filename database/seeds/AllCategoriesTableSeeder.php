<?php
use Illuminate\Database\Seeder;
use App\Models\Category;

use Categories\MarketPlaceSeeder;
use Categories\TaxStatusSeeder;
use Categories\IncomeTypeSeeder;
use Categories\ImmigrationDocumentSeeder;
use Categories\ExceptionalCircumstancesSeeder;
use Categories\LevelSeeder;
use Categories\QuoteStatusSeeder;
use Categories\SpecializationSeeder;


class AllCategoriesTableSeeder extends Seeder
{
   
    public function run()
    {
    	DB::statement('SET FOREIGN_KEY_CHECKS=0');
    	Category::truncate();
        $this->call(MarketPlaceSeeder::class);
        $this->call(TaxStatusSeeder::class);
        $this->call(IncomeTypeSeeder::class);
        $this->call(ImmigrationDocumentSeeder::class);
        $this->call(ExceptionalCircumstancesSeeder::class);
        $this->call(LevelSeeder::class);
        $this->call(QuoteStatusSeeder::class);
        $this->call(SpecializationSeeder::class);

    	DB::statement('SET FOREIGN_KEY_CHECKS=1');

    }
}
