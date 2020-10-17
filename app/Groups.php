<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Groups extends Model
{
    public $timestamps = false;
    protected $fillable = ['label', 'slug', 'vector'];
    protected $casts = [
        'vector'=>'array'
    ];

    public function filters() {
        return $this->belongsToMany('App\Filters', 'group_filter', 'group_id', 'filter_id');
    }

    public function preferences() {
        return $this->belongsToMany('App\Attributes', 'group_preference', 'group_id', 'preference_id');
    }

    public function criteria() {
        return $this->belongsToMany('App\Attributes', 'group_criteria', 'criteria_id', 'group_id');
    }
}
