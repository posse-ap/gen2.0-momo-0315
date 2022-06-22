<?php

use Illuminate\Database\Seeder;

class QuestionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $questions = [
            [
                'big_question_id' => 1,
                'question_id' => 1,
                'img' => 'takanawa.png'
            ],
            [
                'big_question_id' => 1,
                'question_id' => 2,
                'img' => 'kameido.png'
            ],
            [
                'big_question_id' => 1,
                'question_id' => 3,
                'img' => 'koujimati.png'
            ],
            [
                'big_question_id' => 2,
                'question_id' => 1,
                'img' => 'mukainada.png'
            ],
        ];
        foreach ($questions as $question) {
            DB::table('questions')->insert($question);
        }
    }
}
