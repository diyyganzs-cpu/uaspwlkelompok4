<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        Category::create([
            'nama' => 'Lingkungan'
        ]);

        Category::create([
            'nama' => 'Infrastruktur'
        ]);

        Category::create([
            'nama' => 'Pelayanan'
        ]);
    }
}