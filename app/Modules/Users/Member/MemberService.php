<?php

namespace App\Modules\Users\Member;

use App\Modules\Users\Member\Member;
use App\Modules\WinningNumber\WinningNumberService;

class MemberService {

    protected $member;

    protected $winning_number_service;

    public function __construct(
        Member $member,
        WinningNumberService $winning_number_service
    ) {
        # code...
        $this->member = $member;
        $this->winning_number_service = $winning_number_service;
    }

    public function getAll()
    {
        # code...
        return $this->member->get();
    }
    
    /**
     * Member Winning Number Crosstab
     *
     * Build an array for rendering data
     * in a crosstab table.
     * 
     * @return array
     */
    public function memberWinningNumberCrosstab()
    {
        # code...
        $collection = $this->getAll();
        $max = $this->winning_number_service->getMax();
        
        $collection = $collection->reduce(function($arr, $item) use($max) {
            $winning_numbers = $item->winning_numbers;
            
            $numbers = [];
            foreach ($winning_numbers as $number) {
               $numbers[] = $number->number;
            }
            $numbers = array_pad($numbers, $max, '');

            $name = $item->name;
            $arr[] = [
                'name' => $name,
                'numbers' => $numbers
            ];
            return $arr;
        }, []);

        return [
            'max' => $max,
            'collection' => $collection
        ];
    }

    

}