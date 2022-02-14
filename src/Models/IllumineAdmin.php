<?php

namespace JoulesLabs\IllumineAdmin\Models;

use Database\Factories\IllumineAdminFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class IllumineAdmin extends Model
{
    use HasFactory;

    public function getTable()
    {
        return config('illumineadmin.users.table');
    }

    protected static function newFactory()
    {
        return IllumineAdminFactory::new();
    }
}
