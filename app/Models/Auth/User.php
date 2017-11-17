<?php

namespace App\Models\Auth;

use App\Models\Auth\Traits\Relationship\UserRelationship;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

/**
 * @property int $id
 * @property int $employee_id
 * @property string $name
 * @property string $email
 * @property string $password
 * @property boolean $admin_flag
 * @property string $remember_token
 * @property Employee $employee
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

    /**
     * @var array
     */
    protected $guarded = [];
}
