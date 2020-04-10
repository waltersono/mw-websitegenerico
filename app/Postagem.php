<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Postagem extends Model
{
    protected $table = 'postagens';

    public function pagina(){
    	return $this->belongsTo(Pagina::class);
    }
}
