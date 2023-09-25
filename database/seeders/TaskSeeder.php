<?php

namespace Database\Seeders;

use App\Models\Task;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Task::create([
            "title" => "Minha tarefa de exemplo",
            "description" => "Apenas testando a criação dessa tarefa",
            "due_date" => "2023-10-20 00:00:00",
            "user_id" => 1,
            "category_id" => 1
        ]);
    }
}
