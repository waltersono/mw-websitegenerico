<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pagina extends Model
{
    
    public function menu(){
    	return $this->belongsTo(Menu::class);
    }

    public function postagens(){
    	return $this->hasMany(Postagem::class);
    }
}
