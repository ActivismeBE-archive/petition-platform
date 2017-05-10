<?php defined('BASEPATH') OR exit('No direct script access allowed');

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Reports extends Model
{
    /**
     * The database table for the database and model.
     *
     * @return string
     */
    protected $table = 'petition_reports';

    /**
     * Mass-assign fields for the database.
     *
     * @return array
     */
    protected $fillable = [];

    /**
     *
     *
     */
    public function comment()
    {
        return $this->belongsToMany(Comments::class, 'petition_reports_pivot')->withTimestamps();
    }
}
