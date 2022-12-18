<?php

namespace JoulesLabs\IllumineAdmin\Models;

use Database\Factories\IllumineAdminFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User;
use Nahid\Permit\Users\Permitable;

class IllumineAdmin extends User
{
    use HasFactory, Permitable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'email_verified_at',
        'password',
        'avatar',
        'designation',
        'status',
        'permissions',
    ];

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        $this->setConnection(config("permit.connection"));
    }

    public function getTable()
    {
        return config('illumineadmin.users.table');
    }

    protected static function newFactory()
    {
        return IllumineAdminFactory::new();
    }

    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = bcrypt($value);
    }
}
