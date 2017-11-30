<?php namespace Categories;

use Illuminate\Database\Seeder;
use App\Models\Category;

class MarketPlaceSeeder extends Seeder
{
  public function run()
  {
  		Category::marketplaceType()->delete();
      $data = [
				0 => [
					'category_code' => '1000000001',
					'category_desc' => 'Marketplace Type',
					'title' 				=> 'State-Based Marketplace',
					'value'					=> '1'
				],
				1 => [
					'category_code' => '1000000002',
					'category_desc' => 'Marketplace Type',
					'title' 				=> 'State-Partnership Marketplace',
					'value'					=> '2'
				],
				2 => [
					'category_code' => '1000000003',
					'category_desc' => 'Marketplace Type',
					'title' 				=> 'Federally-Facilitated Marketplace',
					'value'					=> '3'
				],
				3 => [
					'category_code' => '1000000004',
					'category_desc' => 'Marketplace Type',
					'title' 				=> 'Federally-supported State Based Marketplace',
					'value'					=> '4'
				],
			];
			foreach($data as $key=>$value) {
				Category::create($value);
			}
    }
}
