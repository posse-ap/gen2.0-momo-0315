<?php

use Illuminate\Database\Seeder;

class LanguagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $languages = [
            [
                'language_name' => 'JavaScript',
                'color' => '#1855EF',
            ],
            [
                'language_name' => 'CSS',
                'color' => '#1170BC',
            ],  [
                'language_name' => 'PHP',
                'color' => '#20BDDE',
            ],  [
                'language_name' => 'HTML',
                'color' => '#3CCEFE',
            ],  [
                'language_name' => 'Laravel',
                'color' => '#B39EF3',
            ],  [
                'language_name' => 'SQL',
                'color' => '#6C47EB',
            ],  [
                'language_name' => 'SHELL',
                'color' => '#6C47EB',
            ],  [
                'language_name' => '情報システム基礎知識(その他)',
                'color' => '#3004C0',
            ],
        ];
        foreach ($languages as $language) {
            DB::table('languages')->insert($language);
        }
    }
}
