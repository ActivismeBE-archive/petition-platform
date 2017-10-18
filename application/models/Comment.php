<?php defined('BASEPATH') OR exit('No direct script access allowed');

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Comment Model.
 *
 * @author    Tim Joosten   <Topairy@gmail.com>
 * @copyright Activisme-BE  <info@activisme.be>
 * @license:  MIT license
 * @since     2017
 * @package   Petitions
 */
class Comment extends Model
{
    use SoftDeletes;

    /**
     * The database table name.
     *
     * @return string
     */
    protected $table = 'comments';

    /**
     * Mass-assign fields.
     *
     * @return array
     */
    protected $fillable = ['comment'];

    /**
     * Get all the comments on a petition.
     *
     * @return belongsToMany data collection.
     */
    public function petitions()
    {
        return $this->belongsToMany('Petitions', 'comments_petitions', 'comment_id', 'manifest_id')
            ->withPivot('author_id')
            ->withTimestamps();
    }

    /**
     * Get the comments for updates.
     *
     * @return belongsToMany data relation
     */
    public function updates()
    {
        return $this->belongsToMany('', '', '', '')
            ->withPivot('author_id')
            ->withTimestamps();
    }

    /**
     *
     *
     * @return belongsToMany data collection.
     */
    public function support()
    {
        return $this->belongsToMany('', '', '', '')
            ->withPivot('author_id')
            ->withTimestamps();
    }
}
