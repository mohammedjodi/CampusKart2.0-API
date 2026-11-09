<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\ProductStatus;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;


class ProductStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $statuses = [
            'Active',
            'Sold',
            'Inactive',
        ];

        foreach ($statuses as $statusName) {
            ProductStatus::updateOrCreate(
                ['name' => $statusName],
                ['slug' => Str::slug($statusName)]
            );
        }
    }
}
