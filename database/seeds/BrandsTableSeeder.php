<?php

use App\Brand;
use Illuminate\Database\Seeder;

class BrandsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $brands = ['Omron', 'Apiglukan', 'Sangreen', 'Nutri Gold', 'Natural Wealths'];

        foreach ($brands as $brand) {
            Brand::create(['name' => $brand]);
        }
    }
}
