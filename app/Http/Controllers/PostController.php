<?php

namespace App\Http\Controllers;

use App\Post;
use App\Pagina;
use App\Categoria;
use App\Tag;
use Storage;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('escritor.posts.index')->with('posts',Post::orderBy('pagina_id')->get());
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('escritor.posts.create')
        ->with('paginas',Pagina::orderBy('menu_id')->get())
        ->with('categorias',Categoria::orderBy('titulo')->get())
        ->with('tags',Tag::orderBy('titulo')->get());
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
            'pagina_id'    =>  'required',
            'titulo'     =>  'required|unique:posts',
            'descricao'     =>  'required',
            'categoria_id'     =>  'required',
            'imagem'     =>  'required|image',
            'conteudo'     =>  'required',
        ]);

        $imagem = $request->imagem->store('posts');


        $post = new Post();
        $post->titulo = $request->titulo;
        $post->descricao = $request->descricao;
        $post->conteudo = $request->conteudo;
        $post->pagina_id = $request->pagina_id;
        $post->categoria_id = $request->categoria_id;
        $post->user_id = auth()->user()->id;
        $post->imagem = $imagem;
        

        $post->save();

        if($request->tag_id){
            $post->tags()->attach($request->tag_id);
        }


        session()->flash('success','Post criado com sucesso');

        return redirect(route('posts.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        return view('escritor.posts.create')
        ->with('post',$post)
        ->with('paginas',Pagina::orderBy('menu_id')->get())
        ->with('categorias',Categoria::orderBy('titulo')->get())
        ->with('tags',Tag::orderBy('titulo')->get());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $this->validate($request,[
            'pagina_id'    =>  'required',
            'categoria_id'    =>  'required',
            'titulo'     =>  'required|unique:posts,titulo,' . $post->id,
            'descricao'     =>  'required',
            'conteudo'     =>  'required',
        ]);

        

        $post->titulo = $request->titulo;
        $post->descricao = $request->descricao;
        $post->conteudo = $request->conteudo;
        $post->pagina_id = $request->pagina_id;
        $post->categoria_id = $request->categoria_id;
        $post->user_id = auth()->user()->id;
        if($request->imagem){
            Storage::delete($post->imagem);
            $imagem = $request->imagem->store('posts');
            $post->imagem = $imagem;
        }
        $post->save();

        if($request->tag_id){
            $post->tags()->attach($request->tag_id);
        }

        session()->flash('success','Post actualizada com sucesso');

        return redirect(route('posts.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();

        session()->flash('success','Post removido com sucesso');
        
        return redirect(route('posts.index'));
    }
}
