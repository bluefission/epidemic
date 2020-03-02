<?php

namespace App\Account;

use GoldSpecDigital\LaravelEloquentUUID\Database\Eloquent\Model;
use Notification;
use App\Notifications\NewStudy;
use App\Notifications\DailySurvey;
use App\Study\Protocol;

class Account extends Model
{
	// protected $table = '';
    //
    protected $fillable = ['user_id', 'first_name', 'last_name', 'user_type_id', 'entitlements'];

    public function user() {
		return $this->belongsTo('App\Account\User');
	}

    public function type() {
		return $this->belongsTo('App\Account\AccountType');
	}

    public function meta() {
		return $this->hasMany('App\Account\AccountMeta');
	}

    public function prompt() {
    	$protocol = new Protocol();
    	try {
            $this->user->notify(new DailySurvey($protocol));
        } catch( \Exception | \Nexmo\Client\Exception\Request $e ) {
            //
        }
    }
}
