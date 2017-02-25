<?php defined('BASEPATH') OR exit('No direct script access allowed');

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

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
    use SoftDeletes;

    /**
     * Database table
     *
     * @var string
     */
    protected $table = 'petitions';

    /**
     * Mass-assign fields.
     *
     * @var Relation instance.
     */
    protected $fillable = ['creator_id', 'category_id', 'title', 'description'];

    /**
     * Get the user >>> creator information.
     *
     * @return relation instance.
     */
    public function creator()
    {
        return $this->belongsTo('Authencate', 'creator_id');
    }

    /**
     * Get the signature data about the petition.
     *
     * @return belongsToMany instance.
     */
    public function signatures()
    {
        // BUG TODO: Create Signature mode
        // BUG TODO: Create MySQL table
        // BUG TODO: Debug this out.

        return $this->belongsToMany('Signature', 'petition_signatures', 'petition_id', 'signature_id')
            ->withTimestamps();
    }
}
