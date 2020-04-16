<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    
    public function pagina(){
    	return $this->belongsTo(Pagina::class);
    }

    public function categoria(){
    	return $this->belongsTo(Categoria::class);
    }

    public function tags(){
    	return $this->belongsToMany(Tag::class);
    }

    public function hasTag($tagId){
        return in_array($tagId, $this->tags->pluck('id')->toArray());
    }
}
