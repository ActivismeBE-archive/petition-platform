<?php defined('BASEPATH') OR exit('No direct script access allowed');

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Authencation ban Model.
 *
 * @author    Tim Joosten   <Topairy@gmail.com>
 * @copyright Activisme-BE  <info@activisme.be>
 * @license:  MIT license
 * @since     2017
 * @package   Petitions
 */
class Ban extends Model
{
    use SoftDeletes;

    /**
     * Database table name.
     *
     * @return string
     */
    protected $table = 'bans';

    /**
     * Mass-assign fields for the database table.
     *
     * @return array
     */
    protected $fillable = ['executed_by', 'reason'];
}
