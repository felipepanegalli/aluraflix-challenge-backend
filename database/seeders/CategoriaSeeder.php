<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'id' => 1,
                'titulo' => 'LIVRE',
                'cor' => '#00c29d',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => 2,
                'titulo' => 'AÇÃO',
                'cor' => '#fc544b',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => 3,
                'titulo' => 'AVENTURA',
                'cor' => '#6777ef',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]
        ];
        DB::table('categorias')->insert($data);
    }
}
