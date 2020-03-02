<?php

namespace Location\App;

use GoldSpecDigital\LaravelEloquentUUID\Database\Eloquent\Model;

class Address extends Model
{
	// protected $table = '';
    //
    protected $fillable = ['line_1', 'line_2', 'city', 'region', 'postal_code', 'country'];

}
