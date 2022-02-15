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

    public function getTable()
    {
        return config('illumineadmin.users.table');
    }

    protected static function newFactory()
    {
        return IllumineAdminFactory::new();
    }
}
