<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Attributes extends Model
{
    public $timestamps = false;
    protected $fillable = ['slug', 'label', 'type', 'variants'];
    public function groups() {
        return $this->belongsToMany('App\Groups', 'group_criteria', 'group_id', 'criteria_id');
    }

    public function pref_groups() {
        return $this->belongsToMany('App\Groups', 'group_preference', 'preference_id', 'group_id');
    }

    public function filters() {
        return $this->hasMany('App\Filters');
    }

    public function preferences() {
        return $this->hasMany('App\Preferences');
    }
}
