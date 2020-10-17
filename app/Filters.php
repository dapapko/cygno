<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Filters extends Model
{
    public $timestamps = false;
    protected $fillable = ['attribute_id', 'label', 'condition', 'variants', 'groups', 'min', 'max', 'step'];
    protected $casts = [
        'variants'=>'array',
        'groups'=>'array'
    ];

    public function groups() {
        return $this->belongsToMany('App\Groups', 'group_filter', 'filter_id', 'group_id');
    }

    public function attribute() {
        return $this->hasOne('App\Attributes');
    }

}
