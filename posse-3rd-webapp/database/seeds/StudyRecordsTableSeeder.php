<?php

use Illuminate\Database\Seeder;

class StudyRecordsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $records = [
            [
                'study_date' => '2022-6-11',
                'study_time' => 6,
                'language_id' => 1,
                'content_id' => 2,
            ],
            [
                'study_date' => '2022-6-12',
                'study_time' => 4,
                'language_id' => 2,
                'content_id' => 2,
            ],
            [
                'study_date' => '2022-6-13',
                'study_time' => 2,
                'language_id' => 3,
                'content_id' => 3,
            ],
            [
                'study_date' => '2022-6-14',
                'study_time' => 4,
                'language_id' => 4,
                'content_id' => 1,
            ],
            [
                'study_date' => '2022-6-25',
                'study_time' => 10,
                'language_id' => 1,
                'content_id' => 2,
            ],
            [
                'study_date' => '2022-6-27',
                'study_time' => 10,
                'language_id' => 1,
                'content_id' => 2,
            ],
            [
                'study_date' => '2022-6-27',
                'study_time' => 10,
                'language_id' => 1,
                'content_id' => 2,
            ],
        ];
        foreach ($records as $record) {
            DB::table('study_records')->insert($record);
        }
    }
}
