<?php

namespace App\Outbreak;

use GoldSpecDigital\LaravelEloquentUUID\Database\Eloquent\Model;

class OutbreakMeta extends Model
{
    //
    public function outbreak() {
    	return $this->belongsTo('App\Outbreak\Outbreak');
    }
}
