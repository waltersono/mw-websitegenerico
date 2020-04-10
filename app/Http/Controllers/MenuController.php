<?php

namespace App\Http\Controllers;

use App\Menu;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('escritor.menus.index')->with('menus',Menu::orderBy('posicao')->get());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('escritor.menus.create');
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
            'posicao'    =>  'required|unique:menus',
            'titulo'    =>  'required|unique:menus',
        ]);

        $menu = new Menu();
        $menu->posicao = $request->posicao;
        $menu->titulo = $request->titulo;
        $menu->save();

        session()->flash('success','Menu criado com sucesso');

        return redirect(route('menus.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function show(Menu $menu)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function edit(Menu $menu)
    {
        return view('escritor.menus.create')->with('menu',$menu);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Menu $menu)
    {
        $this->validate($request,[
            'posicao'    =>  'unique:menus,posicao,' . $menu->id,
            'titulo'    =>  'unique:menus,titulo,' . $menu->id
        ]);

        $menu->posicao = $request->posicao;
        $menu->titulo = $request->titulo;
        $menu->save();

        session()->flash('success','Menu actualizado com sucesso');

        return redirect(route('menus.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function destroy(Menu $menu)
    {
        if($menu->submenus->count() > 0){
            session()->flash('danger','Este menu tem submenus associados');
        }else{
            $menu->delete();

            session()->flash('success','Menu removido com sucesso');
        }
        

        return redirect(route('menus.index'));
    }
}
