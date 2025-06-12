<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = [
            // Mie Ayam (category_id: 1)
            [
                'name' => 'Mie Ayam Original',
                'slug' => Str::slug('Mie Ayam Original'),
                'category_id' => 1,
                'price' => 15000,
                'stock' => 100,
                'description' => 'Mie ayam dengan topping ayam suwir, pangsit, dan sayuran segar',
                'image' => 'mie-ayam-original.jpg',
                'status' => 'active',
            ],
            [
                'name' => 'Mie Ayam Jumbo',
                'slug' => Str::slug('Mie Ayam Jumbo'),
                'category_id' => 1,
                'price' => 20000,
                'stock' => 80,
                'description' => 'Mie ayam porsi jumbo dengan double topping ayam dan pangsit',
                'image' => 'mie-ayam-jumbo.jpg',
                'status' => 'active',
            ],
            [
                'name' => 'Mie Ayam Spesial',
                'slug' => Str::slug('Mie Ayam Spesial'),
                'category_id' => 1,
                'price' => 18000,
                'stock' => 90,
                'description' => 'Mie ayam dengan tambahan telur rebus, jamur, dan acar',
                'image' => 'mie-ayam-spesial.jpg',
                'status' => 'active',
            ],
            [
                'name' => 'Mie Ayam Ceker',
                'slug' => Str::slug('Mie Ayam Ceker'),
                'category_id' => 1,
                'price' => 17000,
                'stock' => 70,
                'description' => 'Mie ayam dengan topping ceker ayam empuk dan gurih',
                'image' => 'mie-ayam-ceker.jpg',
                'status' => 'active',
            ],

            // Mie Bakso (category_id: 2)
            [
                'name' => 'Mie Bakso Original',
                'slug' => Str::slug('Mie Bakso Original'),
                'category_id' => 2,
                'price' => 16000,
                'stock' => 85,
                'description' => 'Mie bakso dengan bakso sapi kenyal dan kuah kaldu segar',
                'image' => 'mie-bakso-original.jpg',
                'status' => 'active',
            ],
            [
                'name' => 'Mie Bakso Jumbo',
                'slug' => Str::slug('Mie Bakso Jumbo'),
                'category_id' => 2,
                'price' => 22000,
                'stock' => 65,
                'description' => 'Mie bakso porsi jumbo dengan bakso besar dan tahu bakso',
                'image' => 'mie-bakso-jumbo.jpg',
                'status' => 'active',
            ],
            [
                'name' => 'Mie Bakso Urat',
                'slug' => Str::slug('Mie Bakso Urat'),
                'category_id' => 2,
                'price' => 19000,
                'stock' => 75,
                'description' => 'Mie bakso dengan bakso urat yang kenyal dan berlemak',
                'image' => 'mie-bakso-urat.jpg',
                'status' => 'active',
            ],
            [
                'name' => 'Mie Bakso Malang',
                'slug' => Str::slug('Mie Bakso Malang'),
                'category_id' => 2,
                'price' => 21000,
                'stock' => 60,
                'description' => 'Mie bakso ala Malang dengan tahu, siomay, dan pangsit goreng',
                'image' => 'mie-bakso-malang.jpg',
                'status' => 'active',
            ],

            // Minuman (category_id: 3)
            [
                'name' => 'Es Teh Manis',
                'slug' => Str::slug('Es Teh Manis'),
                'category_id' => 3,
                'price' => 5000,
                'stock' => 200,
                'description' => 'Es teh manis segar dengan gula aren',
                'image' => 'es-teh-manis.jpg',
                'status' => 'active',
            ],
            [
                'name' => 'Es Jeruk',
                'slug' => Str::slug('Es Jeruk'),
                'category_id' => 3,
                'price' => 8000,
                'stock' => 150,
                'description' => 'Es jeruk peras segar dengan perasan jeruk asli',
                'image' => 'es-jeruk.jpg',
                'status' => 'active',
            ],
            [
                'name' => 'Teh Hangat',
                'slug' => Str::slug('Teh Hangat'),
                'category_id' => 3,
                'price' => 4000,
                'stock' => 180,
                'description' => 'Teh hangat manis yang menghangatkan',
                'image' => 'teh-hangat.jpg',
                'status' => 'active',
            ],
            [
                'name' => 'Es Campur',
                'slug' => Str::slug('Es Campur'),
                'category_id' => 3,
                'price' => 12000,
                'stock' => 100,
                'description' => 'Es campur dengan tape, kolang kaling, dan sirup',
                'image' => 'es-campur.jpg',
                'status' => 'active',
            ],
            [
                'name' => 'Air Mineral',
                'slug' => Str::slug('Air Mineral'),
                'category_id' => 3,
                'price' => 3000,
                'stock' => 300,
                'description' => 'Air mineral dalam kemasan 600ml',
                'image' => 'air-mineral.jpg',
                'status' => 'active',
            ],

            // Lainnya (category_id: 4)
            [
                'name' => 'Pangsit Goreng',
                'slug' => Str::slug('Pangsit Goreng'),
                'category_id' => 4,
                'price' => 10000,
                'stock' => 120,
                'description' => 'Pangsit goreng renyah dengan isian ayam cincang',
                'image' => 'pangsit-goreng.jpg',
                'status' => 'active',
            ],
            [
                'name' => 'Siomay',
                'slug' => Str::slug('Siomay'),
                'category_id' => 4,
                'price' => 8000,
                'stock' => 100,
                'description' => 'Siomay ikan kukus dengan sambal kacang',
                'image' => 'siomay.jpg',
                'status' => 'active',
            ],
            [
                'name' => 'Tahu Bakso',
                'slug' => Str::slug('Tahu Bakso'),
                'category_id' => 4,
                'price' => 6000,
                'stock' => 150,
                'description' => 'Tahu putih dengan isian bakso halus',
                'image' => 'tahu-bakso.jpg',
                'status' => 'active',
            ],
            [
                'name' => 'Kerupuk',
                'slug' => Str::slug('Kerupuk'),
                'category_id' => 4,
                'price' => 2000,
                'stock' => 200,
                'description' => 'Kerupuk renyah sebagai pelengkap mie',
                'image' => 'kerupuk.jpg',
                'status' => 'active',
            ],
            [
                'name' => 'Acar',
                'slug' => Str::slug('Acar'),
                'category_id' => 4,
                'price' => 3000,
                'stock' => 180,
                'description' => 'Acar timun dan tauge segar',
                'image' => 'acar.jpg',
                'status' => 'active',
            ],
        ];

        foreach ($products as $product) {
            Product::create($product);
        }
    }
}
