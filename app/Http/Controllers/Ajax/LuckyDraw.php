<?php

namespace App\Http\Controllers\Ajax;

use App\Http\Controllers\Controller;
use App\Modules\LuckyDraw\LuckyDrawService;
use Illuminate\Http\Request;

class LuckyDraw extends Controller
{
    //
    protected $lucky_draw_service;

    public function __construct(LuckyDrawService $lucky_draw_service)
    {
        # code...
        $this->lucky_draw_service = $lucky_draw_service;
    }

    public function index(Request $request)
    {
        # code...
        $draw = $this->lucky_draw_service->generatePrizes();
    }

}
