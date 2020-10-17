<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Preferences extends Model
{
    public $timestamps = false;
    protected $fillable = ['attribute_id', 'label', 'variants', 'groups', 'slug', 'type'];
    protected $casts = [
        'variants'=>'array',
        'groups'=>'array'
    ];

    public function groups() {
        return $this->belongsToMany('App\Groups', 'group_preference', 'preference_id', 'group_id');
    }

    public function attribute() {
        return $this->hasOne('App\Attributes');
    }
}
