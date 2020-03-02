<?php

namespace App\Account;

use GoldSpecDigital\LaravelEloquentUUID\Database\Eloquent\Model;

class AccountMetaCategory extends Model
{
    //

    public function category() {
		return $this->hasMany('App\Account\AccountMetaCategory');
	}

    public function type() {
		return $this->hasMany('App\Account\AccountMetaType');
	}

}
