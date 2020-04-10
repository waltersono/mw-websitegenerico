<?php

namespace App\Http\Controllers;

use App\Pagina;
use App\Menu;
use Illuminate\Http\Request;

class PaginaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('escritor.paginas.index')
        ->with('paginas',Pagina::orderBy('menu_id')->orderBy('posicao')->get());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('escritor.paginas.create')->with('menus',Menu::orderBy('posicao')->get());
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
            'titulo'     =>  'required|unique:paginas',
            'conteudo'     =>  'required',
            'menu_id'    =>  'required',
        ]);

        $pagina = new Pagina();
        $pagina->posicao = $request->posicao;
        $pagina->titulo = $request->titulo;
        $pagina->conteudo = $request->conteudo;
        $pagina->menu_id = $request->menu_id;
        $pagina->save();

        session()->flash('success','Pagina criado com sucesso');

        return redirect(route('paginas.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Pagina  $pagina
     * @return \Illuminate\Http\Response
     */
    public function show(Pagina $pagina)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Pagina  $pagina
     * @return \Illuminate\Http\Response
     */
    public function edit(Pagina $pagina)
    {
        return view('escritor.paginas.create')
        ->with('pagina',$pagina)
        ->with('menus',Menu::orderBy('posicao')->get());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Pagina  $pagina
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pagina $pagina)
    {
        $this->validate($request,[
            'posicao'    =>  'required',
            'titulo'     =>  'required|unique:paginas,titulo,' . $pagina->id,
            'conteudo'     =>  'required',
            'menu_id'    =>  'required',
        ]);

        $pagina->posicao = $request->posicao;
        $pagina->titulo = $request->titulo;
        $pagina->conteudo = $request->conteudo;
        $pagina->menu_id = $request->menu_id;
        $pagina->save();

        session()->flash('success','Pagina actualizada com sucesso');

        return redirect(route('paginas.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Pagina  $pagina
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pagina $pagina)
    {
        if($pagina->postagens->count() > 0){

            session()->flash('danger','Este submenu tem postagens associadas');

        }else{

            $pagina->delete();

            session()->flash('success','Pagina removido com sucesso');
        }
        
        return redirect(route('paginas.index'));
    }
}
