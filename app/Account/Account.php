<?php

namespace App\Account;

use GoldSpecDigital\LaravelEloquentUUID\Database\Eloquent\Model;

class Account extends Model
{
	// protected $table = '';
    //
    protected $fillable = ['user_id', 'first_name', 'last_name', 'user_type_id', 'entitlements'];
}
