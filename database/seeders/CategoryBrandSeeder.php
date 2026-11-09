<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Brand;
use App\Models\Category;

class CategoryBrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categoryBrands = [
            'Phones & Tablets' => [
                'Apple', 'Samsung', 'Tecno', 'Infinix', 'Xiaomi',
                'Oppo', 'Vivo', 'Huawei', 'Nokia', 'Google',
                'OnePlus', 'Others',
            ],

            'Computers & Laptops' => [
                'Apple', 'HP', 'Dell', 'Lenovo', 'ASUS',
                'Acer', 'Microsoft', 'Others',
            ],

            'Electronics' => [
                'Sony', 'LG', 'JBL', 'Hisense', 'Panasonic', 'Others',
            ],

            'Fashion' => [
                'Nike', 'Adidas', 'Puma', 'Reebok', 'Others',
            ],

            'Shoes' => [
                'Nike', 'Adidas', 'Puma', 'Reebok', 'Others',
            ],

            'Books & Study Materials' => [
                'Others',
            ],

            'Furniture' => [
                'Others',
            ],

            'Home and Kitchen' => [
                'Others',
            ],

            'Sports & Fitness' => [
                'Others',
            ],

            'Beauty & Personal Care' => [
                'Others',
            ],

            'Services' => [
                'Others',
            ],

            'Other' => [
                'Others',
            ],
        ];

        // Grab each category and its corresponding brand names
        foreach ($categoryBrands as $categoryName => $brandNames) {
            // Grab the category name from the Category table
            $category = Category::where('name', $categoryName)->firstOrFail();

            // Find the brand name in the brands table an get the column ids then finally add turn them  in to  php lists(Array)
            $brandIds = Brand::whereIn('name', $brandNames)
                ->pluck('id')
                ->toArray();

            // finally sync all category_id  to their corresponding brandIds
            $category->brands()->sync($brandIds);
        }
    }
}
