<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Illuminate\Support\Str;
use App\Models\Condition;

class ConditionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $conditions = [
            'Brand New',
            'Like New',
            'Good',
            'Fairly Used',
            'Used'
        ];

        foreach ($conditions as $conditionName) {
            Condition::updateOrCreate(
                ['name' => $conditionName],
                ['slug' => Str::slug($conditionName)]
            );
        }
    }
}
