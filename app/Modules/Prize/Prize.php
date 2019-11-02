<?php

namespace App\Modules\Prize;

use App\Modules\DrawWinners\DrawWinner;
use Illuminate\Database\Eloquent\Model;

class Prize extends Model
{
    //

    public function winner()
    {
        # code...
        return $this->hasOne(DrawWinner::class);
    }
}
