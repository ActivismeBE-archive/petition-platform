<?php if defined('BASEPATH') OR exit('No direct script access allowed');

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Comment extends Model
{
    protected $table = 'comments';

    protected $fillable = ['user_id', 'comment'];

    public function author()
    {
        
    }
}
