<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MusicTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $param = [
            'title' => '宇多田ヒカル',
            'artist' => 'Keep Tryin',
            'file' => ' '
        ];
        DB::table('music')->insert($param);
        $param = [
            'title' => 'Lau-Fi',
            'artist' => 'Laur',
            'file' => ''
        ];
        DB::table('music')->insert($param);
        $param = [
            'title' => 'Ravey Sit',
            'artist' => 'DJ Myosuke',
            'file' => ''
        ];
        DB::table('music')->insert($param);
    }
}
