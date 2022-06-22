<?php

use Illuminate\Database\Seeder;

class ContentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $contents = [
            [
                'content_name' => 'ドットインストール',
                'color' => '#1855EF',
            ],
            [
                'content_name' => 'N予備',
                'color' => '#1170BC',
            ],
            [
                'content_name' => 'POSSE課題',
                'color' => '#20BDDE',
            ],
        ];
        foreach ($contents as $content) {
            DB::table('contents')->insert($content);
        }
    }
}
