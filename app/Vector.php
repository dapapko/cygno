<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class Vector extends Model
{
    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;
    protected $fillable = ['vector', 'group_id'];
    protected $primaryKey = "group_id";


}
?>
