<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;
    protected $fillable = ['name', 'slug'];


}
?>
