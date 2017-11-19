<?php

namespace App\Models\Auth;

use App\Models\Auth\Traits\Relationship\UserRelationship;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

/**
 * Class User
 * @package App\Models\Auth
 */
class User extends Authenticatable
{
    use Notifiable;
    use UserRelationship;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'user';

    /**
     * @var array
     */
    protected $fillable = ['employee_id', 'name', 'email', 'remember_token', 'password', 'admin_flag'];
}
