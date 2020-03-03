<?php

namespace Location\App;

use GoldSpecDigital\LaravelEloquentUUID\Database\Eloquent\Model;

class Address extends Model
{
	// protected $table = '';
    //
    protected $fillable = ['line_1', 'line_2', 'city_id', 'region_id', 'postal_code', 'country_id'];

    public function city()
    {
    	return $this->belongsTo('\App\Location\City');
    }

    public function region()
    {
    	return $this->belongsTo('\App\Location\Region');
    }

    public function country()
    {
    	return $this->belongsTo('\App\Location\Country');
    }

}
