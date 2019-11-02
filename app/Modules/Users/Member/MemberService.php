<?php

namespace App\Modules\Users\Member;

use App\Modules\Users\Member\Member;

class MemberService {

    protected $member;

    public function __construct(Member $member)
    {
        # code...
        $this->member = $member;
    }

    public function getAll()
    {
        # code...
        return $this->member->get();
    }

    

}