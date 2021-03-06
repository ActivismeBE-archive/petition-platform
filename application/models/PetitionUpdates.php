<?php defined('BASEPATH') OR exit('No direct script access allowed');

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Update Model.
 *
 * @author    Tim Joosten   <Topairy@gmail.com>
 * @copyright Activisme-BE  <info@activisme.be>
 * @license:  MIT license
 * @since     2017
 * @package   Petitions
 */
class PetitionUpdates extends Model
{
    use SoftDeletes;

    /**
     * The database table name.
     *
     * @return string
     */
    protected $table = 'petition_update';

    /**
     * Mass assign fields for the database.
     *
     * @return array
     */
    protected $fillable = ['author_id', 'title', 'description'];

    /**
     * Get the creator for the update.
     *
     * @return belongsTo instances
     */
    public function author()
    {
        return $this->belongsTo('Authencate', 'author_id');
    }
}
