<?php

use App\Category;
use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = ['Brojac koraka', 'Inhalatori', 'Tablete', 'Ulje', 'Namaz'];

        foreach ($categories as $category) {
            Category::create(['name' => $category]);
        }
    }
}
