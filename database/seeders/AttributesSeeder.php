<?php

namespace Database\Seeders;

use App\Models\Attributes;
use Illuminate\Database\Seeder;

class AttributesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        Attributes::updateOrCreate(['titulo' => 'Marcas'], [
            'id' => 1,
            'titulo' => 'Marcas',
            'is_multiple' => 0
        ]);
     
    }
}
