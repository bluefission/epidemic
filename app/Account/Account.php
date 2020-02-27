<?php

namespace App\Account;

use Illuminate\Database\Eloquent\Model;
use GoldSpecDigital\LaravelEloquentUUID\Database\Eloquent\Model;

class Account extends Model
{
	// protected $table = '';
    //
    protected $fillable = ['user_id', 'first_name', 'last_name', 'phone', 'address_id'];
}
