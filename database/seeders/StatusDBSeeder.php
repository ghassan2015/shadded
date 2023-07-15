<?php

namespace Database\Seeders;

use App\Models\Status;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StatusDBSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $status=[


            [
                'name'=>    'بانتظار الموافقة',
            'isDriver'=>1,
              'isUser' =>0
            ],


            [
                'name'=>     'جار التنفيد',
                'isDriver'=>1,
                'isUser' =>1
            ],


            [
                'name'=>   'الغاء العملية',
                'isDriver'=>1,
                'isUser' =>1
            ],


            [
               'name'=> 'مكتمل',
                'isDriver'=>1,
                'isUser' =>1
            ],


            [
                'مستبعد',
                'isDriver'=>1,
                'isUser' =>1
            ],
        ];

        foreach ($status as$value){
            Status::query()->create(
                [
                    'name'=>$value['name'],

                ]
            );
        }
    }
}
