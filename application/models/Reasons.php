<?php defined('BASEPATH') OR exit('No direct script access allowed');

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Block reasons Model.
 *
 * @author    Tim Joosten   <Topairy@gmail.com>
 * @copyright Activisme-BE  <info@activisme.be>
 * @license:  MIT license
 * @since     2017
 * @package   Petitions
 */
class Reasons extends Model
{
    /**
     * The database table name.
     *
     * @return string
     */
    protected $table = 'report_reasons';

    /**
     * Mass-asign fields
     *
     * @return array
     */
    protected $fillable = ['reason_name', 'reason_description'];
}
