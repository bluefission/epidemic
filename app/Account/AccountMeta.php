<?php

namespace App\Account;

use GoldSpecDigital\LaravelEloquentUUID\Database\Eloquent\Model;

class AccountMeta extends Model
{
    //
    protected $table = "account_meta";

    public function type() {
		return $this->belongsTo('App\Account\AccountMetaType');
	}
}
