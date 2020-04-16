<?php

use Illuminate\Database\Seeder;
use App\Menu;

class MenusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $menu = new Menu();
        $menu->posicao = 1;
        $menu->titulo = 'Quem Somos';
        $menu->save();

        $menu = new Menu();
        $menu->posicao = 2;
        $menu->titulo = 'Programas';
        $menu->save();

        $menu = new Menu();
        $menu->posicao = 3;
        $menu->titulo = 'TICs';
        $menu->save();

        $menu = new Menu();
        $menu->posicao = 4;
        $menu->titulo = 'Noticias';
        $menu->save();
    }
}
