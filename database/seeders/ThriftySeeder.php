<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ThriftySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $thrifty = [
            [
                'brand_name' => 'Adidas',
                'description' => 'High-quality sportswear brand',
                'price' => 50.00
            ],
            [
                'brand_name' => 'Nike',
                'description' => 'Iconic athletic apparel and footwear brand',
                'price' => 60.00
            ],
            [
                'brand_name' => 'Puma',
                'description' => 'Known for its athletic and casual footwear',
                'price' => 40.00
            ],
            [
                'brand_name' => 'New Balance',
                'description' => 'Comfortable and durable sneakers',
                'price' => 55.00
            ],
            [
                'brand_name' => 'Under Armour',
                'description' => 'Performance apparel and footwear',
                'price' => 45.00
            ],
            [
                'brand_name' => 'Reebok',
                'description' => 'Fitness and training apparel and footwear',
                'price' => 35.00
            ],
            [
                'brand_name' => 'Converse',
                'description' => 'Classic canvas sneakers',
                'price' => 30.00
            ],
            [
                'brand_name' => 'Vans',
                'description' => 'Skateboarding and lifestyle brand',
                'price' => 40.00
            ],
            [
                'brand_name' => 'ASICS',
                'description' => 'Running shoes and athletic gear',
                'price' => 50.00
            ],
            [
                'brand_name' => 'Skechers',
                'description' => 'Casual and performance footwear',
                'price' => 40.00
            ],
            [
                'brand_name' => 'FILA',
                'description' => 'Sportswear and casual apparel',
                'price' => 35.00
            ]
        ];

        foreach ($thrifty as $thrift) {
            DB::table('thrifties')->insert($thrift);
        }
        
    }
}
