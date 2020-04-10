<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class LoginController extends Controller
{
    public function login(){
    	return view('auth.login');
    }

    public function logout(){
    	Auth::logout();
    	return redirect(route('login'));
    }

    public function entrar(Request $request){
    	$this->validate($request, [
    		'email'	=>	'required',
    		'password'	=>	'required|min:8'
    	]);


    	if(Auth::attempt(['email' =>	$request->email,'password'	=>	$request->password])){
    		return redirect(route('home'));
    	}

    	session()->flash('warning','Email e Senha nao correspondem');

    	return redirect()->back();
    }

    
}
