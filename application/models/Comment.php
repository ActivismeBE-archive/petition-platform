<?php defined('BASEPATH') OR exit('No direct script access allowed');

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

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
     *
     *
     * 
     */
    public function updates() 
    {

    }

    /**
     *
     *
     * @return belongsToMany data collection. 
     */
    public function support() 
    {

    }
}
