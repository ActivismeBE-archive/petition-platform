<?php defined('BASEPATH') OR exit('No direct script access allowed');

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Comment extends Model
{
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
}
