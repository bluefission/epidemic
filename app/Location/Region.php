<?php

namespace Location\App;

use GoldSpecDigital\LaravelEloquentUUID\Database\Eloquent\Model;

class Region extends Model
{
	// protected $table = '';
    //
    protected $fillable = ['name', 'abbreviation'];

    public function counties()
    {
    	return $this->hasMany('\App\Location\County');
    }

    public function country()
    {
    	return $this->belongsTo('\App\Location\Country')
    }
}
