<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\News;
use Illuminate\Support\Str;

class NewsSeeder extends Seeder
{
    public function run(): void
    {
        $items = [
            [
                'title' => 'ตัวอย่างข่าวกีฬา #1',
                'slug' => 'sample-sports-news-1',
                'category' => 'sports',
                'source' => 'SAMPLE',
                'source_url' => 'https://example.com/1',
                'image_url' => null,
                'excerpt' => 'สรุปสั้น ๆ ของข่าวกีฬา #1 (ตัวอย่างสำหรับทดสอบ)',
                'content' => 'นี่คือเนื้อหาข่าวฉบับเต็มสำหรับทดสอบระบบ แทนด้วยข่าวจริงภายหลัง',
                'published_at' => now()->subDays(1),
            ],
            [
                'title' => 'ตัวอย่างข่าวกีฬา #2',
                'slug' => 'sample-sports-news-2',
                'category' => 'sports',
                'source' => 'SAMPLE',
                'source_url' => 'https://example.com/2',
                'image_url' => null,
                'excerpt' => 'สรุปสั้น ๆ ของข่าวกีฬา #2 (ตัวอย่างสำหรับทดสอบ)',
                'content' => 'เนื้อหาข่าวฉบับเต็ม (ทดสอบ)',
                'published_at' => now()->subDays(2),
            ],
            [
                'title' => 'ตัวอย่างข่าวกีฬา #3',
                'slug' => 'sample-sports-news-3',
                'category' => 'sports',
                'source' => 'SAMPLE',
                'source_url' => 'https://example.com/3',
                'image_url' => null,
                'excerpt' => 'สรุปสั้น ๆ ของข่าวกีฬา #3',
                'content' => 'เนื้อหาข่าวฉบับเต็ม (ทดสอบ)',
                'published_at' => now()->subDays(3),
            ],
            [
                'title' => 'ตัวอย่างข่าวกีฬา #4',
                'slug' => 'sample-sports-news-4',
                'category' => 'sports',
                'source' => 'SAMPLE',
                'source_url' => 'https://example.com/4',
                'image_url' => null,
                'excerpt' => 'สรุปสั้น ๆ ของข่าวกีฬา #4',
                'content' => 'เนื้อหาข่าวฉบับเต็ม (ทดสอบ)',
                'published_at' => now()->subDays(4),
            ],
            [
                'title' => 'ตัวอย่างข่าวกีฬา #5',
                'slug' => 'sample-sports-news-5',
                'category' => 'sports',
                'source' => 'SAMPLE',
                'source_url' => 'https://example.com/5',
                'image_url' => null,
                'excerpt' => 'สรุปสั้น ๆ ของข่าวกีฬา #5',
                'content' => 'เนื้อหาข่าวฉบับเต็ม (ทดสอบ)',
                'published_at' => now()->subDays(5),
            ],
            [
                'title' => 'ตัวอย่างข่าวกีฬา #6',
                'slug' => 'sample-sports-news-6',
                'category' => 'sports',
                'source' => 'SAMPLE',
                'source_url' => 'https://example.com/6',
                'image_url' => null,
                'excerpt' => 'สรุปสั้น ๆ ของข่าวกีฬา #6',
                'content' => 'เนื้อหาข่าวฉบับเต็ม (ทดสอบ)',
                'published_at' => now()->subDays(6),
            ],
            [
                'title' => 'ตัวอย่างข่าวกีฬา #7',
                'slug' => 'sample-sports-news-7',
                'category' => 'sports',
                'source' => 'SAMPLE',
                'source_url' => 'https://example.com/7',
                'image_url' => null,
                'excerpt' => 'สรุปสั้น ๆ ของข่าวกีฬา #7',
                'content' => 'เนื้อหาข่าวฉบับเต็ม (ทดสอบ)',
                'published_at' => now()->subDays(7),
            ],
            [
                'title' => 'ตัวอย่างข่าวกีฬา #8',
                'slug' => 'sample-sports-news-8',
                'category' => 'sports',
                'source' => 'SAMPLE',
                'source_url' => 'https://example.com/8',
                'image_url' => null,
                'excerpt' => 'สรุปสั้น ๆ ของข่าวกีฬา #8',
                'content' => 'เนื้อหาข่าวฉบับเต็ม (ทดสอบ)',
                'published_at' => now()->subDays(8),
            ],
            [
                'title' => 'ตัวอย่างข่าวกีฬา #9',
                'slug' => 'sample-sports-news-9',
                'category' => 'sports',
                'source' => 'SAMPLE',
                'source_url' => 'https://example.com/9',
                'image_url' => null,
                'excerpt' => 'สรุปสั้น ๆ ของข่าวกีฬา #9',
                'content' => 'เนื้อหาข่าวฉบับเต็ม (ทดสอบ)',
                'published_at' => now()->subDays(9),
            ],
            [
                'title' => 'ตัวอย่างข่าวกีฬา #10',
                'slug' => 'sample-sports-news-10',
                'category' => 'sports',
                'source' => 'SAMPLE',
                'source_url' => 'https://example.com/10',
                'image_url' => null,
                'excerpt' => 'สรุปสั้น ๆ ของข่าวกีฬา #10',
                'content' => 'เนื้อหาข่าวฉบับเต็ม (ทดสอบ)',
                'published_at' => now()->subDays(10),
            ],
        ];

        News::insert($items);
    }
}
