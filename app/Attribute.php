<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class Attribute extends Model
{
/**
* Indicates if the model should be timestamped.
*
* @var bool
*/
public $timestamps = false;
protected $fillable = ['slug', 'type', 'calc', 'options', 'label', 'filter_label', 'input', 'filter_condition'];


}
?>