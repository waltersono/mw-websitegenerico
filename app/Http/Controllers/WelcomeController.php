<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Menu;
use App\Pagina;
use App\Configuration;
use App\Contacto;
use Auth;

class WelcomeController extends Controller
{
    public function index(){
    	return view('website.index')
    	->with('menus', Menu::orderBy('posicao')->get());
    }

    public function showPage(Pagina $pagina){
    	return view('website.components.page')
    	->with('pagina',$pagina)
    	->with('menus', Menu::orderBy('posicao')->get());
        
    }
}
