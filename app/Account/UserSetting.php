<?php

namespace App\Account;

use GoldSpecDigital\LaravelEloquentUUID\Database\Eloquent\Model;

class UserSetting extends Model
{
    //
    public function privacy() {
        return $this->hasOne('App\Account\PrivacyLevel');
    }
}
