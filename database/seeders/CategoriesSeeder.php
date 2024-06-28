<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategoriesSeeder extends Seeder
{
  /**
   * Run the database seeds.
   */
  public function run(): void
  {
    $categoryModel = new Category();
    $categories = [
      'Water Management', 'Health Management', 'Nutrition', 'Genetics'
    ];

    foreach ($categories as $category) {
      $categoryModel->createCategory($category);
    }
  }
}
