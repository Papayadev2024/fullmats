<?php

namespace Database\Seeders;

use App\Models\AttributeProductValues;
use App\Models\Attributes;
use App\Models\AttributesValues;
use Illuminate\Database\Seeder;
use Maatwebsite\Excel\Facades\Excel;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\Importable;

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

        Excel::import(
            new class implements ToModel
            {
                public function model(array $row)
                {
                    if (!is_numeric($row[0])) return null;

                    AttributesValues::updateOrCreate([
                        'id' => $row[0]
                    ], [
                        'attribute_id' => $row[1],
                        'valor' => $row[2],
                        'imagen' => 'images/img/noimagen.jpg',
                        'visible' => $row[3],
                        'status' => $row[4]
                    ]);
                }
            },
            'storage/app/utils/AttributesValues.xlsx'
        );


        Excel::import(
            new class implements ToModel
            {
                public function model(array $row)
                {
                    if (!is_numeric($row[0])) return null;

                    AttributeProductValues::updateOrCreate([
                        'id' => $row[1]
                    ], [
                        'product_id' => $row[1],
                        'attribute_id' => $row[2],
                        'attribute_value_id' => $row[3],
                    ]);
                }
            },
            'storage/app/utils/AttributesValuesProduct.xlsx'
        );
     
    }
}
