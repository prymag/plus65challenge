<?php

namespace App\Modules\LuckyDraw\DrawGenerators;

use App\Modules\LuckyDraw\DrawGenerators\AbstractDrawGenerator;
use App\Modules\LuckyDraw\Queries;
use App\Modules\Prize\Prize;
use App\Modules\WinningNumber\WinningNumber;

class GrandPrize extends AbstractDrawGenerator {    

    public function generate(Prize $prize)
    {
        # code...
        $query = $this->queries->nonWinners();
        $collection = $query->get();

        $max = $collection->max('total');
        $members = $this->collection_parser
            ->filter($collection, 'total', $max);
        $member_ids = $members->pluck('w_member_id')->toArray();
        
        $winning_number = $this->getWinningNumber($member_ids);

        if (!$winning_number) {
            return;
        }

        return $this->save($winning_number, $prize);
    }

}