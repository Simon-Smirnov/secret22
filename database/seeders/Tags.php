<?php

namespace Database\Seeders;

use App\Models\Tag;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Tags extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Tag::create(['title' => 'Sport']);
        Tag::create(['title' => 'Electric']);
        Tag::create(['title' => 'Hydrogen']);
    }
}
