<?php defined('BASEPATH') OR exit('No direct script access allowed');

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cities extends Model
{
    use SoftDeletes;

    protected $primaryKey = 'city_id';

    protected $table = 'cities';

    protected $fillable = [];
}
