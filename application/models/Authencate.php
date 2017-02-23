<?php defined('BASEPATH') OR exit('No direct script access allowed');

use Illuminate\Database\Eloquent\Model;

/**
 * Authencation Model.
 *
 * @author    Tim Joosten   <Topairy@gmail.com>
 * @copyright Activisme-BE  <info@activisme.be>
 * @license:  MIT license
 * @since     2017
 * @package   Petitions
 */
class Authencate extends Model
{
    /**
     *
     */
    protected $table = 'users';

    /**
     *
     */
    protected $fillable = [];
}
