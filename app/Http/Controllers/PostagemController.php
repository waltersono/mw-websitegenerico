<?php

namespace App\Http\Controllers;

use App\Postagem;
use App\Pagina;
use Illuminate\Http\Request;

class PostagemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('escritor.postagens.index')->with('postagens',Postagem::orderBy('pagina_id')->get());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('escritor.postagens.create')->with('paginas',Pagina::orderBy('menu_id')->get());
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
            'titulo'     =>  'required|unique:postagem',
            'descricao'     =>  'required',
            'conteudo'     =>  'required',
            'pagina_id'    =>  'required',
        ]);

        $postagem = new Postagem();
        $postagem->posicao = $request->posicao;
        $postagem->titulo = $request->titulo;
        $postagem->descricao = $request->descricao;
        $postagem->conteudo = $request->conteudo;
        $postagem->pagina_id = $request->pagina_id;
        $postagem->save();

        session()->flash('success','Postagem criado com sucesso');

        return redirect(route('postagem.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Postagem  $postagem
     * @return \Illuminate\Http\Response
     */
    public function show(Postagem $postagem)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Postagem  $postagem
     * @return \Illuminate\Http\Response
     */
    public function edit(Postagem $postagem)
    {
        return view('escritor.postagens.create')
        ->with('postagem',$postagem)
        ->with('paginas',Pagina::orderBy('posicao')->get());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Postagem  $postagem
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Postagem $postagem)
    {
        $this->validate($request,[
            'posicao'    =>  'required',
            'titulo'     =>  'required|unique:postagem,titulo,' . $postagem->id,
            'descricao'     =>  'required',
            'conteudo'     =>  'required',
            'pagina_id'    =>  'required',
        ]);

        $postagem->posicao = $request->posicao;
        $postagem->titulo = $request->titulo;
        $postagem->descricao = $request->descricao;
        $postagem->conteudo = $request->conteudo;
        $postagem->pagina_id = $request->pagina_id;
        $postagem->save();

        session()->flash('success','Postagem actualizada com sucesso');

        return redirect(route('postagem.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Postagem  $postagem
     * @return \Illuminate\Http\Response
     */
    public function destroy(Postagem $postagem)
    {
        $postagem->delete();

        session()->flash('success','Postagem removido com sucesso');
        
        return redirect(route('postagem.index'));
    }
}
