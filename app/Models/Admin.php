<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Builder;

class Admin extends User
{
    //
    protected $table = 'users';

    protected $attributes = [
        'level' => 1,
    ];

    protected static function boot()
    {
        parent::boot();

        static::addGlobalScope('level', function (Builder $builder) {
            $builder->where('level', 1);
        });
    }

}
