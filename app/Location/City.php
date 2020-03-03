<?php

namespace Location\App;

use GoldSpecDigital\LaravelEloquentUUID\Database\Eloquent\Model;

class City extends Model
{
	// protected $table = '';
    //
    protected $fillable = ['name', 'code'];

    public function county()
    {
    	return $this->belongsTo('\App\Location\County');
    }

    public function region()
    {
        return $this->belongsTo('\App\Location\Region');
    }

    // public function addresses()
    // {
    //     return $this->hasMany('\App\Location\Address');
    // }
}
