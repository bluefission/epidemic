<?php

namespace App\Outbreak;

use GoldSpecDigital\LaravelEloquentUUID\Database\Eloquent\Model;

class Symptom extends Model
{
    //
    public function outbreaks() {
    	return $this->belongsToMany('App\Outbreak\Outbreak');
    }
}
