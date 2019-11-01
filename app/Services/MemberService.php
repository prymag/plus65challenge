<?php

namespace App\Services;

use App\Models\Member;

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