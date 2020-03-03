<?php

namespace Location\App;

use GoldSpecDigital\LaravelEloquentUUID\Database\Eloquent\Model;

class Country extends Model
{
	// protected $table = '';
    //
    protected $fillable = ['name', 'abbreviation'];

    public function regions()
    {
    	return $this->hasMany('\App\Location\Regions');
    }
}
