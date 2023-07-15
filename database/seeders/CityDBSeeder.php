<?php

namespace Database\Seeders;

use App\Models\City;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CityDBSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

            $cities=[
                [
                    'name'=>'الرياض',
                    'countryId'   =>'1' ,

                ],
                [            'name'=>'الدمام',
                    'countryId'   =>'1' ,

                ],

                [            'name'=>'ابو ظبي',
                    'countryId'   =>'2' ,

                ],


                [            'name'=>'الشارقة',
                    'countryId'   =>'2' ,

                ],
            ];

            foreach ($cities as $value){
                City::query()->create([
                    'name'=>$value['name'],
                    'countryId'=>$value['countryId'],
                ]);
            }
    }
}
