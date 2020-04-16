<?php

use Illuminate\Database\Seeder;
use App\Pagina;

class PaginasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $pagina = new Pagina();
        $pagina->menu_id = 4;
        $pagina->posicao = 1;
        $pagina->titulo = "Noticias";
        $pagina->conteudo = "bla bla bla";
        $pagina->save();
    }
}
