<?php 

namespace App\Modules\Prize;

use App\Modules\Base\Seed;

class PrizeSeed extends Seed  {

    protected $data = [
        [
            'title' => 'Grand Prize',
            'key' => 'grand_prize',
            'sort_order' => 1
        ],
        [
            'title' => 'Second Prize - 1st Winner',
            'key' => 'second_prize_1',
            'sort_order' => 2
        ],
        [
            'title' => 'Second Prize - 2nd Winner',
            'key' => 'second_prize_2',
            'sort_order' => 3
        ],
        [
            'title' => 'Third Prize - 1st Winner',
            'key' => 'third_prize_1',
            'sort_order' => 4
        ],
        [
            'title' => 'Third Prize - 2nd Winner',
            'key' => 'third_prize_2',
            'sort_order' => 5
        ]
    ];

}