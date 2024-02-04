<?php

namespace Database\Seeders;

use App\Models\AlcoholicBeverage;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AlcoholicBeverageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $alcoholic_beverages = [
            ['name' => 'ビール', 'alcoholContent' => '4%～6%'],
            ['name' => 'ワイン', 'alcoholContent' => '9%～16%'],
            ['name' => 'シャンパン', 'alcoholContent' => '8%～12%'],
            ['name' => '日本酒', 'alcoholContent' => '15%～17%'],
            ['name' => 'ウイスキー', 'alcoholContent' => '40%～50%'],
            ['name' => 'バーボン', 'alcoholContent' => '40%～50%'],
            ['name' => 'ラム', 'alcoholContent' => '37.5%～80%'],
            ['name' => 'テキーラ', 'alcoholContent' => '35%～55%'],
            ['name' => 'ジン', 'alcoholContent' => '37.5%～47%']
        ];

        foreach($alcoholic_beverages as $alcoholic_beverage) {

            AlcoholicBeverage::create([
                'name' => $alcoholic_beverage['name'],
                'alcohol_content' => $alcoholic_beverage['alcoholContent']
            ]);

        }
    }
}
