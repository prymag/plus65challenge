<?php

namespace App\Modules\LuckyDraw\DrawGenerators;

use App\Modules\LuckyDraw\DrawGenerators\AbstractDrawGenerator;
use App\Modules\Prize\Prize;

class GrandPrize extends AbstractDrawGenerator {    

    public function generate(Prize $prize, $winning_number = false)
    {
        # code...
        $this->setWinningNumberSearch($winning_number, $search);

        $query = $this->queries->nonWinners();
        $collection = $query->get();

        $max = $collection->max('total');
        $members = $this->collection_parser
            ->filter($collection, 'total', $max);

        $member_ids = $members->pluck('w_member_id')->toArray();

        $this->isNoMemberAvailable($member_ids);
        $winning_number = $this->getWinningNumber($member_ids, $search);

        if (!$winning_number) {
            return;
        }

        return $this->save($winning_number, $prize);
    }

    

}