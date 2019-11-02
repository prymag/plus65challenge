<?php

namespace App\Modules\LuckyDraw\DrawGenerators;

use App\Modules\LuckyDraw\DrawGenerators\AbstractDrawGenerator;
use App\Modules\Prize\Prize;

class RandomPrize extends AbstractDrawGenerator {    

    public function generate(Prize $prize)
    {
        # code...
        $query = $this->queries->nonWinners();
        $collection = $query->get();

        $member_ids = $collection->pluck('w_member_id')->toArray();
        
        $winning_number = $this->getWinningNumber($member_ids);

        if (!$winning_number) {
            return;
        }

        return $this->save($winning_number, $prize);
    }
    
}