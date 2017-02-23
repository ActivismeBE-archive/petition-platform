<?php defined('BASEPATH') OR exit('No direct script access allowed');

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Abilities Model.
 *
 * @author    Tim Joosten   <Topairy@gmail.com>
 * @copyright Activisme-BE  <info@activisme.be>
 * @license:  MIT license
 * @since     2017
 * @package   Petitions
 */
class Abilities extends Model
{
    use SoftDeletes;
    
    /**
     * The database table name.
     *
     * @return string
     */
    protected $table = 'abilities';

    /**
     * Mass-assign entities for the table.
     *
     * @return array
     */
    protected $fillable = ['name', 'description'];
}
