<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Submenu extends Model
{
    public function menu(){
    	return $this->belongsTo(Menu::class);
    }

    public function paginas(){
    	return $this->hasMany(Pagina::class);
    }

    public function postagens(){
    	return $this->hasMany(Postagem::class);
    }
}
