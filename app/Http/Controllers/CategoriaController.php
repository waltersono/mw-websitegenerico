<?php

namespace App\Http\Controllers;

use App\Categoria;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('escritor.categorias.index')->with('categorias',Categoria::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('escritor.categorias.create');
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
            'titulo'    =>  'required|unique:categorias',
        ]);

        $categoria = new Categoria();
        $categoria->titulo = $request->titulo;
        $categoria->save();

        session()->flash('success','Categoria criado com sucesso');

        return redirect(route('categorias.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Categoria  $categoria
     * @return \Illuminate\Http\Response
     */
    public function show(Categoria $categoria)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Categoria  $categoria
     * @return \Illuminate\Http\Response
     */
    public function edit(Categoria $categoria)
    {
        return view('escritor.categorias.create')->with('categoria',$categoria);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Categoria  $categoria
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Categoria $categoria)
    {
        $this->validate($request,[
            'titulo'    =>  'unique:categorias,titulo,' . $categoria->id
        ]);

        $categoria->titulo = $request->titulo;
        $categoria->save();

        session()->flash('success','Categoria actualizado com sucesso');

        return redirect(route('categorias.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Categoria  $categoria
     * @return \Illuminate\Http\Response
     */
    public function destroy(Categoria $categoria)
    {
        if($categoria->posts->count() > 0){
            session()->flash('danger','Este categoria tem postagens associados');
        }else{
            $categoria->delete();

            session()->flash('success','Categoria removido com sucesso');
        }
        

        return redirect(route('categorias.index'));
    }
}
