<?php defined('BASEPATH') OR exit('No direct script access allowed');

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Countries extends Model
{
    use SoftDeletes;

    protected $primaryKey = 'country_id';

    /**
     * The database table name. 
     *
     * @return string
     */
    protected $table = 'countries';

    /**
     * Mass assign fields for the database table. 
     * 
     * @return array
     */
    protected $fillable = [];
}
