<?php

use Illuminate\Database\Seeder;

class ChoicesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $choices = [
            [
                'big_question_id' => 1,
                'question_id' => 1,
                'choice_name' => 'たかなわ',
                'option_number' => 0,
            ],
            [
                'big_question_id' => 1,
                'question_id' => 1,
                'choice_name' => 'たかわ',
                'option_number' => 1,
            ],
            [
                'big_question_id' => 1,
                'question_id' => 1,
                'choice_name' => 'こうわ',
                'option_number' => 2,
            ],
            [
                'big_question_id' => 1,
                'question_id' => 2,
                'choice_name' => 'かめと',
                'option_number' => 0,
            ],
            [
                'big_question_id' => 1,
                'question_id' => 2,
                'choice_name' => 'かめど',
                'option_number' => 1,
            ],
            [
                'big_question_id' => 1,
                'question_id' => 2,
                'choice_name' => 'かめいど',
                'option_number' => 2,
            ],
            [
                'big_question_id' => 1,
                'question_id' => 3,
                'choice_name' => 'おかちまち',
                'option_number' => 0,
            ],
            [
                'big_question_id' => 1,
                'question_id' => 3,
                'choice_name' => 'かゆまち',
                'option_number' => 1,
            ],
            [
                'big_question_id' => 1,
                'question_id' => 3,
                'choice_name' => 'こうじまち',
                'option_number' => 2,
            ],
            [
                'big_question_id' => 2,
                'question_id' => 1,
                'choice_name' => 'むかいだな',
                'option_number' => 0,
            ],
            [
                'big_question_id' => 2,
                'question_id' => 1,
                'choice_name' => 'むこうひら',
                'option_number' => 1,
            ],
            [
                'big_question_id' => 2,
                'question_id' => 1,
                'choice_name' => 'むきひら',
                'option_number' => 2,
            ],
        ];
        foreach($choices as $choice) {
            DB::table('choices')->insert($choice);
        }
    }
}
