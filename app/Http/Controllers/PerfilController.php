<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Hash;

class PerfilController extends Controller
{
    public function index(){
    	return view('auth.perfil')->with('user',auth()->user());
    }

    public function update(Request $request){
	    $user = auth()->user();

    	$this->validate($request, [
    		'name'	=>	'required',
    		'email'	=>	'unique:users,email,' . $user->id,
            'old_password' => 'sometimes',
            'password'  =>  'sometimes|confirmed',
            'password_confirmation'  => 'sometimes|same:password'
	    ]);

    	$user->name = $request->name;
    	$user->email = $request->email;

        if(isset($request->password)){
            if(Hash::check($request->old_password, $user->password)){
                $user->password = bcrypt($request->password);
                session()->flash('success','Perfil e senha actualizada com sucesso');
            }else{
                session()->flash('danger','Senha nao actualizada: antiga senha incorrecta');
            }
        }
        
        $user->save();
        session()->flash('success','Perfil actualizado com sucesso');


	    return redirect()->back();

    }

}
