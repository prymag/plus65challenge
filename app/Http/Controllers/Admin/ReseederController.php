<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Modules\Base\LogService;
use App\Modules\Users\Member\Member;
use App\Modules\Users\Member\MemberService;
use App\Modules\WinningNumber\WinningNumber;
use App\Modules\WinningNumber\WinningNumberService;
use Illuminate\Http\Request;

class ReseederController extends Controller 
{
    //
    protected $log_service;

    protected $member_service;

    protected $winning_number_service;

    public function __construct(
        LogService $log_service,
        MemberService $member_service,
        WinningNumberService $winning_number_service
    ) {
        # code...
        $this->log_service = $log_service;
        $this->winning_number_service = $winning_number_service;
        $this->member_service = $member_service;
    }

    public function reSeed()
    {
        # code...
        try {
            $this->member_service->dropAll();
            $this->member_service->seed();
            $members = $this->member_service->getAll();
            $this->winning_number_service->seed($members);

            return redirect()
                ->back()
                ->with('success', __('Re-Seed Completed'));
        } catch (\Exception $e) {
            $time = $this->log_service->log($e, 'error');
            $msg = "{$time}: {$e->getMessage()}";
            return redirect()
                ->back()
                ->with('process-error', $msg);
        }
    }
}
