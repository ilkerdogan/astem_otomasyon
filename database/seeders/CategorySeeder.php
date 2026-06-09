<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            [
                'name'        => 'Kablolar ve İletkenler',
                'slug'        => 'kablolar-ve-iletkenler',
                'description' => 'NYM, NYY, NHXMH ve diğer enerji kabloları.',
            ],
            [
                'name'        => 'Anahtarlar ve Prizler',
                'slug'        => 'anahtarlar-ve-prizler',
                'description' => 'Modüler sigortalar, NH sigortalar, topraklı prizler.',
            ],
            [
                'name'        => 'Aydınlatma Ekipmanları',
                'slug'        => 'aydinlatma-ekipmanlari',
                'description' => 'LED paneller, floresan armatürler ve aksesuarları.',
            ],
        ];

        foreach ($categories as $data) {
            Category::create($data);
        }
    }
}
