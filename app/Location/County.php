<?php

namespace Location\App;

use GoldSpecDigital\LaravelEloquentUUID\Database\Eloquent\Model;

class County extends Model
{
	// protected $table = '';
    //
    protected $fillable = ['name', 'code'];

    public function cities()
    {
    	return $this->hasMany('\App\Location\City');
    }

    public function county()
    {
    	return $this->belongsTo('\App\Location\County')
    }

    public function country()
    {
    	return $this->belongsTo('\App\Location\Country')
    }

    // public function addresses()
    // {
    //     return $this->hasMany('\App\Location\Address');
    // }
}
