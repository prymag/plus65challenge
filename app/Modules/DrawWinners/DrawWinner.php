<?php

namespace App\Modules\DrawWinners;

use App\Modules\Users\Member\Member;
use App\Modules\WinningNumber\WinningNumber;
use Illuminate\Database\Eloquent\Model;

class DrawWinner extends Model
{
    //
    public function member()
    {
        # code...
        return $this->belongsTo(Member::class);
    }

    public function winning_number()
    {
        # code...
        return $this->belongsTo(WinningNumber::class, 'winning_number_id',  'id');
    }
}
