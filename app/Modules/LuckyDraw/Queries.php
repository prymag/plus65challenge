<?php

namespace App\Modules\LuckyDraw;

use App\Modules\WinningNumber\WinningNumber;
use Illuminate\Database\DatabaseManager as Db;
use Illuminate\Database\Eloquent\Builder;

class Queries {

    protected $db;

    protected $winning_number;
    
    public function __construct(
        Db $db,
        WinningNumber $winning_number
    ) {
        # code...
        $this->db = $db;
        $this->winning_number = $winning_number;
    }

    public function nonWinners()
    {
        # code...
        $fields = [
           $this->db->raw('count(*) as total'),
           'winning_numbers.member_id AS w_member_id',
           'prize_id'
        ];

        return $this->winning_number
            ->select($fields)
            ->leftJoin('draw_winners', 'draw_winners.member_id', '=', 'winning_numbers.member_id')
            ->groupBy('w_member_id', 'prize_id')
            ->whereNull('prize_id');
    }

    /**
     * Query to get a random wining number
     * based on the member_ids.
     * The member_ids passed should be of non winners
     *
     * @param Array[int] $member_ids
     * @return Builder
     */
    public function winningNumber($member_ids)
    {
        # code...
        return $this->winning_number
            ->whereIn('winning_numbers.member_id', $member_ids)
            ->inRandomOrder();
    }

}