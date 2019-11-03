<?php

namespace App\Modules\WinningNumber;

use Illuminate\Database\DatabaseManager as Db;

class WinningNumberService {
    //
    protected $winning_number;

    protected $db;

    public function __construct(
        Db $db,
        WinningNumber $winning_number
    ) {
        # code...
        $this->db = $db;
        $this->winning_number = $winning_number;
    }

    public function getMax()
    {
        # code...
        return $this->db->select("
            SELECT MAX(total) as maximum
            FROM (
                SELECT count(number) as total FROM `winning_numbers` GROUP BY member_id
            ) 
            AS result")[0]->maximum;
    }

}