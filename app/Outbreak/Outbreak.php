<?php

namespace App\Outbreak;

use GoldSpecDigital\LaravelEloquentUUID\Database\Eloquent\Model;
use App\Search\Searchable;

class Outbreak extends Model
{
    //
    use Searchable;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'outbreak_type_id', 'name', 'icd10', 'r0_rating', 'virulence', 'fatality_rate', 'zero_day', 'status_id'
    ];

    public function type() {
		return $this->belongsTo('App\Outbreak\OutbreakType');
	}

    public function transmissionType() {
        return $this->belongsTo('App\Outbreak\OutbreakTransmissionType');
    }

    public function status() {
        return $this->belongsTo('App\Outbreak\OutbreakStatus');
    }

    public function symptoms() {
    	return $this->belongsToMany('App\Outbreak\Symptom');
    }

    public function confirmations() {
    	return $this->hasMany('App\Outbreak\OutbreakConfirmation');
    }

    public function treatments() {
    	return $this->belongsToMany('App\Outbreak\Treatment');
    }

    public function meta() {
    	return $this->hasMany('App\Outbreak\OutbreakMeta');
    }
}
