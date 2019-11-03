<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use App\Modules\Users\Member\MemberService;
use Illuminate\Http\Request;

class MemberController extends Controller
{
    //
    protected $member_service;

    public function __construct(MemberService $member_service)
    {
        # code...
        $this->member_service = $member_service;
    }

    public function index()
    {
        # code...
        $crosstab = $this->member_service->memberWinningNumberCrosstab();
        $data = compact('crosstab');
        
        return view('member.index', $data);
    }
}
