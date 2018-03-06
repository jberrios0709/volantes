<?php

use Illuminate\Database\Seeder;

class MeasureTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $measures=[
            [
                'measure'=>'10x7.5'
            ],
            [
                'measure'=>'10x15'
            ],
            [
                'measure'=>'20x15'
            ],
            [
                'measure'=>'20x30'
            ]
        ];

        foreach($measures as $measure){
            \App\Measure::Create($measure);
        };
    }
}
