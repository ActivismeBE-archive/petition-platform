<?php defined('BASEPATH') OR exit('No direct script access allowed');

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use SoftDeletes;

    /**
     * The database table name.
     *
     * @return string
     */
    protected $table = 'categories';

    /**
     * Mass-assign fields for the database table.
     *
     * @return array
     */
    protected $fillable = ['category_module', 'category_name', 'category_description'];

    /**
     * Get the support items form the category.
     *
     * @return belongsToMany rezlationship.
     */
    public function support()
    {
        return $this->belongsToMany()
            ->withTimestamps();
    }

    /**
     * Get the petitions form the category.
     *
     * @return belongsToMany relationship.
     */
    public function petitions()
    {
        return $this->belongsToMany()
            ->withTimestamps();
    }
}
