<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Modules\Prize\CollectionParser as PrizeCollectionParser;
use App\Modules\Prize\PrizeService;
use App\Modules\Users\Member\MemberService;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //
    protected $member_service;

    protected $prize_service;

    protected $prize_collection_parser;
    //
    public function __construct(
        MemberService $member_service,
        PrizeService $prize_service,
        PrizeCollectionParser $prize_collection_parser
    ) {
        # code...
        $this->member_service = $member_service;
        $this->prize_service = $prize_service;
        $this->prize_collection_parser = $prize_collection_parser;
    }

    public function index(Request $request)
    {
        # code...
        $prizes = $this->prize_service->getAll();
        $prizes_options = $this->prize_collection_parser->toSelectOpts($prizes);
        $prizes_grouped = $this->prize_collection_parser->groupPrizes($prizes);
        
        $winning_number = $request->session()->get('winning_number');
        
        $prize_id = old('prize_id') ?
            old('prize_id') : 
            $request->session()->get('prize_id');
        $randomized = old('randomized') ?
            old('randomized') :
            $request->session()->get('randomized');

        $crosstab = $this->member_service->memberWinningNumberCrosstab();
        
        $data = compact(
            'prizes', 
            'prizes_grouped', 
            'prizes_options', 
            'winning_number', 
            'crosstab',
            'prize_id',
            'randomized'
        );
        
        return view('admin.dashboard.index', $data);
    }

}
