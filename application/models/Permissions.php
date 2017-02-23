<?php defined('BASEPATH') OR exit('No direct script access allowed');

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Permissions Model.
 *
 * @author    Tim Joosten   <Topairy@gmail.com>
 * @copyright Activisme-BE  <info@activisme.be>
 * @license:  MIT license
 * @since     2017
 * @package   Petitions
 */
class Permissions extends Model
{
    use SoftDeletes;
    
    /**
     * The database table name
     *
     * @return string
     */
    protected $table = 'permissions';

    /**
     * Mass-data entities for the database.
     *
     * @return array
     */
    protected $fillable = ['name', 'description'];
}
