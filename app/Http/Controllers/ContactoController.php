<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pagina;
use App\Menu;
use App\Contacto;

class ContactoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.contactos.index')->with('mensagens',Contacto::orderBy('lida')->get());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Pagina $pagina)
    {
        return view('website.components.contactus')
        ->with('menus', Menu::orderBy('posicao')->get());
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
            'email' =>  'required|email',
            'assunto'   =>  'required',
            'mensagem'  =>  'required'
        ]);

        $contacto = new Contacto();
        $contacto->email = $request->email;
        $contacto->assunto = $request->assunto;
        $contacto->mensagem = $request->mensagem;
        $contacto->save();

        session()->flash('success','Sua mensagem foi enviada com sucesso. Obrigado');

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $contacto = Contacto::find($id);
        $contacto->lida = true;
        $contacto->save();
        return view('admin.contactos.show')->with('mensagem',Contacto::find($id));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $contacto = Contacto::find($id);
        $contacto->delete();
        session()->flash('success','Mensagem removida com sucesso');

        return redirect(route('contactos.index'));
    }
}
