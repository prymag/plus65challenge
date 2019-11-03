<?php

namespace App\Modules\DrawWinners;

class DrawWinnerService {

    protected $draw_winner;

    public function __construct(DrawWinner $draw_winner)
    {
        # code...
        $this->draw_winner = $draw_winner;
    }

    public function addWinner($opts)
    {
        # code...
        $model = $this->draw_winner->make();
        $model->member_id = $opts['member_id'];
        $model->winning_number_id = $opts['winning_number_id'];
        $model->prize_id = $opts['prize_id'];
        $model->save();

        // Make relationships available after saving
        $model->load('winning_number');
        $model->load('member');

        return $model;
    }

    public function clear()
    {
        # code...
        $this->draw_winner->truncate();
    }

}