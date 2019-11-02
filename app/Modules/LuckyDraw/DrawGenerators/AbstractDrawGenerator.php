<?php

namespace App\Modules\LuckyDraw\DrawGenerators;

use App\Modules\Base\CollectionParser;
use App\Modules\DrawWinners\DrawWinnerService;
use App\Modules\LuckyDraw\Queries;
use App\Modules\Prize\Prize;
use App\Modules\WinningNumber\WinningNumber;

abstract class AbstractDrawGenerator {

    protected $queries;

    protected $draw_winner_service;

    public function __construct(
        Queries $queries,
        DrawWinnerService $draw_winner_service,
        CollectionParser $collection_parser
    ) {
        # code...
        $this->queries = $queries;
        $this->draw_winner_service = $draw_winner_service;
        $this->collection_parser = $collection_parser;
    }

    public function generate(Prize $prize)
    {
        # code...
    }

    public function getWinningNumber($member_ids)
    {
        # code...
        $query = $this->queries->winningNumber($member_ids);
        return $query->first();
    }

    public function save(WinningNumber $winning_number, Prize $prize)
    {
        # code...
        $opts = [
            'member_id' => $winning_number->member_id,
            'winning_number_id' => $winning_number->id,
            'prize_id' => $prize->id
        ];
        return $this->draw_winner_service->addWinner($opts);
    }

}