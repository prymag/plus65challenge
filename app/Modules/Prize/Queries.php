<?php

namespace App\Modules\Prize;

class Queries {
    //
    protected $prize;

    public function __construct(Prize $prize)
    {
        # code...
        $this->prize = $prize;
    }

    public function activePrizes()
    {
        # code...
        $fields = [
            'prizes.id as id',
            'key',
            'sort_order',
            'title'
        ];
        return $this->prize
            ->select($fields)
            ->leftJoin('draw_winners', 'draw_winners.prize_id', '=', 'prizes.id')
            ->whereNull('draw_winners.prize_id')
            ->orderBy('sort_order', 'asc');
    }

}