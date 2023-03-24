<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\ProductType;

class ProductTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ProductType::create([
            'name' => 'Raiment',
            'model' => '\App\Models\CoffeeProduct',
            'description' => 'An e-commerce type in which different types of raiment products are sold e.g T-shirts, shoes, jackets'
        ]);
        ProductType::create([
            'name' => 'Coffee',
            'model' => '\App\Models\RaimentProduct',
            'description' => 'An e-commerce type in which different types of raiment products are sold e.g Sidamo, Jimma'
        ]);
        ProductType::create([
            'name' => 'Electronics',
            'model' => '\App\Models\ElectronicProduct',
            'description' => 'An e-commerce type in which different types of electronic products are sold e.g TVs, smartphones, laptops'
        ]);
    }
}
