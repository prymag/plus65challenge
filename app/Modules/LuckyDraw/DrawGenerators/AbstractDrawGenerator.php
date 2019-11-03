<?php

namespace App\Modules\LuckyDraw\DrawGenerators;

use App\Modules\Base\CollectionParser;
use App\Modules\DrawWinners\DrawWinnerService;
use App\Modules\LuckyDraw\Queries;
use App\Modules\LuckyDraw\Exceptions\NoMemberAvailableException;
use App\Modules\LuckyDraw\Exceptions\WinningNumberNotFound;
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

    public function generate(Prize $prize, $winning_number)
    {
        # code...
    }

    public function isNoMemberAvailable($member_ids)
    {
        # code...
        if (empty($member_ids)) {
            throw new NoMemberAvailableException('No Member Available');
        }
    }

    public function getWinningNumber($member_ids, $search = false)
    {
        # code...
        $query = $this->queries->winningNumber($member_ids, $search);
        $winning_number = $query->first();

        if (!$winning_number) {
            throw new WinningNumberNotFound("Winning number not found");
        }

        return $winning_number;
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

    public function setWinningNumberSearch($winning_number, &$search)
    {
        # code...
        if ($winning_number) {
            $search['field'] = 'number';
            $search['value'] = $winning_number;
        }
    }

}