<?php defined('BASEPATH') OR exit('No direct script access allowed');

use Illuminate\Database\Eloquent\Model;

/**
 * Authencation Model.
 *
 * @author    Tim Joosten   <Topairy@gmail.com>
 * @copyright Activisme-BE  <info@activisme.be>
 * @license:  MIT license
 * @since     2017
 * @package   Petitions
 */
class Authencate extends Model
{
    /**
     * The database table name
     *
     * @return string
     */
    protected $table = 'users';

    /**
     * Mass-assign entities for the database.
     *
     * @return array
     */
    protected $fillable = ['ban_id', 'username', 'name', 'blocked', 'password', 'email'];

    /**
     * User permissions data relation
     *
     * @return BelongsToMany instance
     */
    public function permissions()
    {
        return $this->belongsToMany('Permissions', 'login_permissions', 'login_id', 'permissions_id')
            ->withTimestamps();
    }

    /**
     * User abilities data relation.
     *
     * @return BelongsToMany instance
     */
    public function abilities()
    {
        return $this->belongsToMany('Abilities', 'login_abilities', 'login_id', 'ability_id')
            ->withTimeStamps();
    }

    /**
     * The ban id for the user.
     *
     * @return belongsTo instance.
     */
    public function ban()
    {
        return $this->belongsTo('Ban', 'ban_id');
    }
}
