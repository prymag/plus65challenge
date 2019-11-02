<?php

namespace App\Modules\Users\Member;

use App\User;
use Illuminate\Database\Eloquent\Builder;

class Member extends User
{
    //
    protected $table = 'users';

    protected $attributes = [
        'level' => 2,
    ];

    protected static function boot()
    {
        parent::boot();

        static::addGlobalScope('level', function (Builder $builder) {
            $builder->where('level', 2);
        });
    }
}
