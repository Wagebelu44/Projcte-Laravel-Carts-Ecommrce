<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ParentCategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $parent_category = \App\Models\Parent_Category::create([
            'name' => ['ar' => 'متاجر رثقميه', 'en' => 'testing'],
        ]);

        $parent_category = \App\Models\Parent_Category::create([
            'name' => 'نصات العاب',
        ]);

        $parent_category = \App\Models\Parent_Category::create([
            'name' => 'بطاقات اتصلات',
        ]);

        $parent_category = \App\Models\Parent_Category::create([
            'name' => 'بطاقات بينات',
        ]);

        $parent_category = \App\Models\Parent_Category::create([
            'name' => 'بطاقات تسوق',
        ]);

        $parent_category = \App\Models\Parent_Category::create([
            'name' => 'خدمات واشتراكات',
        ]);
    }
}
