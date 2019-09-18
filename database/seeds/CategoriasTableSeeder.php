<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('categorias')->insert([
            'nome'=> 'Romanticas'
        ]);

        DB::table('categorias')->insert([
            'nome'=> 'Cultura POP'
        ]);

        DB::table('categorias')->insert([
            'nome'=> 'Familia'
        ]);

        DB::table('categorias')->insert([
            'nome'=> 'Programacao'
        ]);
    }
}
