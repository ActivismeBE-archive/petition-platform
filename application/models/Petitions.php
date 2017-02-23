<?php defined('BASEPATH') OR exit('No direct script access allowed');

use Illuminate\Database\Eloquent\Model;

/**
 * Petition Model.
 *
 * @author    Tim Joosten   <Topairy@gmail.com>
 * @copyright Activisme-BE  <info@activisme.be>
 * @license:  MIT license
 * @since     2017
 * @package   Petitions
 */
class Petitions extends Model
{
    /**
     * Database table
     *
     * @var string
     */
    protected $table = 'petitions';

    /**
     * Mass-assign fields.
     *
     * @var array
     */
    protected $fillable = ['creator_id', 'category_id', 'title', 'description'];

    public function creator()
    {
        return $this->belongsTo('Authencate', 'creator_id');
    }

    public function signatures()
    {
        
    }

    public function categories()
    {

    }
}
