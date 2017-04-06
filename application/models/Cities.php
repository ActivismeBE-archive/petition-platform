<?php defined('BASEPATH') OR exit('No direct script access allowed');

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cities extends Model
{
    use SoftDeletes;

    /**
     * 
     * 
     */
    protected $primaryKey = 'city_id';

    /**
     * The database table field. 
     *
     * @return string
     */
    protected $table = 'cities';

    /**
     * Mass-assign database fields. 
     *
     * @return array 
     */
    protected $fillable = [];
}
