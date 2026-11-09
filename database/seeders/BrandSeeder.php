<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Brand;
use Illuminate\Support\Str;

class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         $brands = [
            // Phones & Tablets
            'Apple',
            'Samsung',
            'Tecno',
            'Infinix',
            'Xiaomi',
            'Oppo',
            'Vivo',
            'Huawei',
            'Nokia',
            'Google',
            'OnePlus',

            // Computers & Laptops
            'HP',
            'Dell',
            'Lenovo',
            'ASUS',
            'Acer',
            'Microsoft',

            // Fashion & Shoes
            'Nike',
            'Adidas',
            'Puma',
            'Reebok',

            // Electronics
            'Sony',
            'LG',
            'JBL',
            'Hisense',
            'Panasonic',

            'Others',
        ];

        foreach ($brands as $brandName) {
            Brand::updateOrCreate(
                ['name' => $brandName],
                ['slug' => Str::slug($brandName)]
            );
        }
    }
}
