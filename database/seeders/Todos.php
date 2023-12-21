<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Todo;

class Todos extends Seeder
{
    public function run(): void
    {
        Todo::create(['user_id' => 1, 'title' => 'End some project', 'status' => 0]);
        Todo::create(['user_id' => 1, 'title' => 'Eat some food', 'status' => 0]);
        Todo::create(['user_id' => 1, 'title' => 'Other action', 'status' => 0]);
    }
}
