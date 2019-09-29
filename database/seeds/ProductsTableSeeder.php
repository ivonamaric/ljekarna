<?php

use App\Product;
use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $products = [
            ['title' => 'Brojac koraka Omron', 'price' => '49.99', 'quantity' => '12', 'description' => 'Brojac koraka', 'category_id' => 1, 'brand_id' => 1, 'user_id' => 2, 'file' => 'omron1.jpg'],
            ['title' => 'Omron inhalator', 'price' => '99.99', 'quantity' => '26', 'description' => 'Inhalator sa 50 udisaja,', 'category_id' => 2, 'brand_id' => 1, 'user_id' => 2, 'file' => 'omron2.jpg'],
            ['title' => 'Apiglukan imuno', 'price' => '15.99', 'quantity' => '50', 'description' => 'Apiglukan Imuno je tekuci dodatak prehrani koji sadrzi (1-3),(1-6)-beta-D-glukan, dobiven ekstrakcijom iz kvasca Saccharomyces cerevisiae, koji ima najpoznatiji utjecaj na aktivaciju imuniteta, ali se koristi i za niz drugih stanja i tegoba.', 'category_id' => 3, 'brand_id' => 2, 'user_id' => 2, 'file' => 'apiglukan1.jpg'],
            ['title' => 'Sangreen - biljno ulje 200 mL', 'price' => '35.99', 'quantity' => '15', 'description' => 'Ljekovito protuupalno i antialergijsko ulje.', 'category_id' => 4, 'brand_id' => 3, 'user_id' => 2, 'file' => 'sangreen1.jpg'],
            ['title' => 'Sangreen - Liposomalni vitamin C 250 mL', 'price' => '21.99', 'quantity' => '41', 'description' => 'Vitamin C u obliku natrij askorbata zasticen liposomalnom membranom prolazi kroz probavni trakt, odlazi izravno u krvotok gdje ga stanicna membrana propusta da ude u stanicu jer je liposom po kemijskoj strukturi slican stanicnoj membrani.  Liposomalni vitamin C ne izaziva probavne tegobe niti u vrlo visokim dozama.', 'category_id' => 3, 'brand_id' => 3, 'user_id' => 2, 'file' => 'sangreen2.png'],
            ['title' => 'Veganski namaz - Organski 135g Nutrigold', 'price' => '12.99', 'quantity' => '61', 'description' => 'Sastojci: suncokretovo ulje,voda,sol, luk, papar, jabucni ocat', 'category_id' => 5, 'brand_id' => 4, 'user_id' => 2, 'file' => 'nutrigold1.png'],
            ['title' => 'Beta karoten', 'price' => '23.99', 'quantity' => '31', 'description' => 'Za zdravu i lijepu kozu', 'category_id' => 3, 'brand_id' => 5, 'user_id' => 2, 'file' => 'naturalWealth1.jpg'],
        ];

        foreach ($products as $product) {

            Product::create([
                'title' => $product['title'],
                'price' => $product['price'],
                'quantity' => $product['quantity'],
                'description' => $product['description'],
                'category_id' => $product['category_id'],
                'brand_id' => $product['brand_id'],
                'user_id' => $product['user_id'],
                'file' => $product['file'],
            ]);
        }
    }
}
