<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        $products = [
            [
                'name' => 'iPhone 15 Pro',
                'description' => 'สมาร์ทโฟน iPhone รุ่นล่าสุด พร้อมชิป A17 Pro และกล้อง 48MP',
                'price' => 42900.00,
                'image' => null,
            ],
            [
                'name' => 'Samsung Galaxy S24',
                'description' => 'สมาร์ทโฟน Android รุ่นพรีเมียม พร้อมกล้อง AI และหน้าจอ Dynamic AMOLED',
                'price' => 32900.00,
                'image' => null,
            ],
            [
                'name' => 'MacBook Air M2',
                'description' => 'แล็ปท็อป MacBook Air พร้อมชิป M2 หน้าจอ 13 นิ้ว',
                'price' => 39900.00,
                'image' => null,
            ],
            [
                'name' => 'iPad Pro 12.9"',
                'description' => 'แท็บเล็ต iPad Pro ขนาด 12.9 นิ้ว พร้อมชิป M2 และหน้าจอ Liquid Retina XDR',
                'price' => 34900.00,
                'image' => null,
            ],
            [
                'name' => 'AirPods Pro 2',
                'description' => 'หูฟังไร้สาย AirPods Pro รุ่นที่ 2 พร้อมระบบ Active Noise Cancellation',
                'price' => 8900.00,
                'image' => null,
            ],
        ];

        foreach ($products as $product) {
            Product::create($product);
        }
    }
}