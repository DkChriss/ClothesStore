<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Product::create([
            'name' => 'Vestido Negro',
            'price' => '99',
            'stock' => '99',
            'path' => 'img/product-1.jpg'
        ]);
        Product::create([
            'name' => 'Blusa Azul',
            'price' => '105',
            'stock' => '99',
            'path' => 'img/product-2.jpg'
        ]);
        Product::create([
            'name' => 'Vestido Azul',
            'price' => '110',
            'stock' => '99',
            'path' => 'img/product-3.jpg'
        ]);
        Product::create([
            'name' => 'Blusa Rojo',
            'price' => '65',
            'stock' => '99',
            'path' => 'img/product-4.jpg'
        ]);
        Product::create([
            'name' => 'Camiseta clasica Celeste',
            'price' => '110',
            'stock' => '99',
            'path' => 'img/product-5.jpg'
        ]);
        Product::create([
            'name' => 'Jean licra',
            'price' => '130',
            'stock' => '99',
            'path' => 'img/product-6.jpg'
        ]);
        Product::create([
            'name' => 'Vestido negro top',
            'price' => '150',
            'stock' => '99',
            'path' => 'img/product-7.jpg'
        ]);
        Product::create([
            'name' => 'Blusa negrilla',
            'price' => '130',
            'stock' => '99',
            'path' => 'img/product-8.jpg'
        ]);
        Product::create([
            'name' => 'Chalecto Bais',
            'price' => '120',
            'stock' => '99',
            'path' => 'img/product-9.jpg'
        ]);
    }
}
