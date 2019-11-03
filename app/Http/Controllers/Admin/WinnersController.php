<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Modules\Base\LogService;
use App\Modules\DrawWinners\DrawWinnerService;
use Illuminate\Http\Request;

class WinnersController extends Controller
{
    //
    protected $draw_winner_service;

    protected $log_service;

    public function __construct(
        DrawWinnerService $draw_winner_service,
        LogService $log_service
    ) {
        # code...
        $this->draw_winner_service = $draw_winner_service;
        $this->log_service = $log_service;
    }

    public function clearWinners()
    {
        # code...
        try {
            $this->draw_winner_service->clear();
            return redirect()
                ->back()
                ->with('success', __('Winners cleared'));
        } catch (\Exception $e) {
            $time = $this->log_service->log($e, 'error');
            $msg = "{$time} - {$e->getMessage()}";
            return redirect()
                ->back()
                ->with('process-error', $msg);
        }
    }
}
