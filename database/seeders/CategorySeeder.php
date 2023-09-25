<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::create([
            "title" => "Categoria de Teste",
            "color" => "#FFFF00",
            "user_id" => 1
        ]);
        Category::create([
            "title" => "Categoria de Teste 2",
            "color" => "#FF0000",
            "user_id" => 1
        ]);
        Category::create([
            "title" => "Categoria de Teste 3",
            "color" => "#FF00FF",
            "user_id" => 1
        ]);
    }
}
