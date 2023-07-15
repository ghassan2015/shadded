<?php

namespace Database\Seeders;

use App\Models\Country;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CountryDBSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $countries=[
            [
          'name'=>'السعودية',
            'photoId'   =>'1' ,
                'postCode'=>'+966',

            ],
[            'name'=>'الامارات',
            'photoId'   =>'2' ,
            'postCode'=>'+971',

        ],
        ];

        foreach ($countries as $value){
            Country::query()->create([
                'name'=>$value['name'],
                'photoId'=>$value['photoId'],
                'postCode'=>$value['postCode'],

            ]);
        }
    }
}
