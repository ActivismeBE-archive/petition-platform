<?php defined('BASEPATH') OR exit('No direct script access allowed');

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Cities Model.
 *
 * @author    Tim Joosten   <Topairy@gmail.com>
 * @copyright Activisme-BE  <info@activisme.be>
 * @license:  MIT license
 * @since     2017
 * @package   Petitions
 */
class Cities extends Model
{
    use SoftDeletes;

    /**
     * The primary key for the database.
     *
     * @return string
     */
    protected $primaryKey = 'id';

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
