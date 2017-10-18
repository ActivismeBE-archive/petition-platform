<?php defined('BASEPATH') OR exit('No direct script access allowed');

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Support questions Model.
 *
 * @author    Tim Joosten   <Topairy@gmail.com>
 * @copyright Activisme-BE  <info@activisme.be>
 * @license:  MIT license
 * @since     2017
 * @package   Petitions
 */
class Question extends Model
{
	/**
	 * The database table name.
	 *
	 * @return string
	 */
	protected $table = 'questions';

	/**
	 * Mass-assign fields for the database.
	 *
	 * @return array
	 */
 	protected $fillable = ['author_id', 'title', 'description', 'public'];

 	/**
 	 * Get the categories for the support question.
 	 *
 	 * @return belongsToMany instance.
 	 */
 	public function catgories()
 	{
 		return $this->belongsToMany('', '', '', '')->withTimestamps();
 	}
}
