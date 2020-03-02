<?php

namespace App\Outbreak;

use GoldSpecDigital\LaravelEloquentUUID\Database\Eloquent\Model;

class Treatment extends Model
{
    //
    public function type() {
		return $this->belongsTo('App\Outbreak\TreatmentType', 'type_id');
	}

	public function outbreaks() {
		return $this->belongsToMany('App\Outbreak\Outbreak');
	}
}
