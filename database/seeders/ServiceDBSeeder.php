<?php

namespace Database\Seeders;

use App\Models\Service;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ServiceDBSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $services=[
            [
          'name'=>'النقل السريع',
                'photoId'=>3
            ],
          [  'name'=>'الشاحنات والدينات',
            'photoId'=>4
        ],
[              'name'=>'اخرى',
                'photoId'=>5
            ],
        ];


        foreach ($services as $value){
            Service::query()->create([
                'name'=>$value['name'],
                'photoId'=>$value['photoId'],
            ]);
        }
    }
}
