<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    public function submenus(){
    	return $this->hasMany(Submenu::class);
    }

    public function paginas(){
    	return $this->hasMany(Pagina::class);
    }
}
