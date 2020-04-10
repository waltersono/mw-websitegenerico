<?php

namespace App\Http\Controllers;

use App\Menu;
use App\Submenu;
use Illuminate\Http\Request;

class SubmenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('escritor.submenus.index')
        ->with('submenus',Submenu::orderBy('menu_id')->orderBy('posicao')->get());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('escritor.submenus.create')->with('menus',Menu::orderBy('posicao')->get());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->validate($request,[
            'posicao'    =>  'required',
            'titulo'    =>  'required|unique:submenus',
            'menu_id'    =>  'required',
        ]);

        $submenu = new Submenu();
        $submenu->posicao = $request->posicao;
        $submenu->titulo = $request->titulo;
        $submenu->menu_id = $request->menu_id;
        $submenu->save();

        session()->flash('success','Submenu criado com sucesso');

        return redirect(route('submenus.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Submenu  $submenu
     * @return \Illuminate\Http\Response
     */
    public function show(Submenu $submenu)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Submenu  $submenu
     * @return \Illuminate\Http\Response
     */
    public function edit(Submenu $submenu)
    {
        return view('escritor.submenus.create')
        ->with('submenu',$submenu)
        ->with('menus',Menu::orderBy('posicao')->get());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Submenu  $submenu
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Submenu $submenu)
    {
        $this->validate($request,[
            'posicao'    =>  'required',
            'titulo'    =>  'unique:submenus,titulo,' . $submenu->id,
            'menu_id'   =>  'required'
        ]);

        $submenu->posicao = $request->posicao;
        $submenu->titulo = $request->titulo;
        $submenu->menu_id = $request->menu_id;
        $submenu->save();

        session()->flash('success','Submenu actualizado com sucesso');

        return redirect(route('submenus.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Submenu  $submenu
     * @return \Illuminate\Http\Response
     */
    public function destroy(Submenu $submenu)
    {
        if($submenu->paginas->count() > 0 || $submenu->postagens->count() > 0){

            session()->flash('danger','Este submenu tem paginas/postagens associadas');

        }else{

            $submenu->delete();

            session()->flash('success','Submenu removido com sucesso');
        }
        

        return redirect(route('submenus.index'));
    }
}
