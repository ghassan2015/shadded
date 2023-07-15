<?php

namespace Database\Seeders;

use App\Models\Attachment;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AttachmentDBSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $attachments=[
            [
            'name'=>'saudiArabia',
            'url'=>'files/saudiArabia.png',

        ],

            [
                'name'=>'unitedEmirates',
                'url'=>'files/unitedEmirates.png',

            ],


            [
                'name'=>'ExpressTransportation',
                'url'=>'files/expressTransportation.png',

            ],


            [
                'name'=>'TrucksCars',
                'url'=>'files/TrucksCars.png',

            ],


            [
                'name'=>'other',
                'url'=>'files/other.png',

            ],
        ];

        foreach ($attachments as $value){
            Attachment::query()->create([
               'name'=>$value['name'] ,
                'url'=>$value['url']
            ]);
        }
    }
}
