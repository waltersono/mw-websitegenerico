<?php

use Illuminate\Database\Seeder;
use App\Categoria;

class CategoriasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categoria = new Categoria();
        $categoria->titulo = 'categoria1';
        $categoria->save();

        $categoria = new Categoria();
        $categoria->titulo = 'categoria2';
        $categoria->save();

        $categoria = new Categoria();
        $categoria->titulo = 'categoria3';
        $categoria->save();
    }
}
