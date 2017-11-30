<?php

use Illuminate\Database\Seeder;
use App\Models\Lead;

class LeadTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Lead::class, 150)->create();
    }
}
