<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        $kablolar    = Category::where('slug', 'kablolar-ve-iletkenler')->first();
        $anahtarlar  = Category::where('slug', 'anahtarlar-ve-prizler')->first();
        $aydinlatma  = Category::where('slug', 'aydinlatma-ekipmanlari')->first();

        $products = [
            [
                'name'        => 'NYM 3x2.5mm² Kablo',
                'code'        => 'NYM-325',
                'category_id' => $kablolar->id,
            ],
            [
                'name'        => 'NH Sigorta 63A',
                'code'        => 'NH-63A',
                'category_id' => $anahtarlar->id,
            ],
            [
                'name'        => 'Topraklı Priz',
                'code'        => 'PRIZ-T16',
                'category_id' => $anahtarlar->id,
            ],
            [
                'name'        => 'LED Panel 60x60',
                'code'        => 'LED-P60',
                'category_id' => $aydinlatma->id,
            ],
            [
                'name'        => 'Floresan Armatür',
                'code'        => 'FL-AR120',
                'category_id' => $aydinlatma->id,
            ],
        ];

        foreach ($products as $data) {
            Product::create($data);
        }
    }
}
