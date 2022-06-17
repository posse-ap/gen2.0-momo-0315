<?php

use Illuminate\Database\Seeder;

class BigQuestionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $big_questions = [
            [
                'big_question_name' => '東京',
            ],
            [
                'big_question_name' => '広島',
            ],
        ];
        foreach($big_questions as $big_question) {
            DB::table('big_questions')->insert($big_question);
        }

    }
}
