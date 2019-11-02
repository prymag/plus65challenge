<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Modules\Prize\CollectionParser as PrizeCollectionParser;
use App\Modules\Prize\PrizeService;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //
    protected $prize_service;

    protected $prize_collection_parser;
    //
    public function __construct(
        PrizeService $prize_service,
        PrizeCollectionParser $prize_collection_parser
    ) {
        # code...
        $this->prize_service = $prize_service;
        $this->prize_collection_parser = $prize_collection_parser;
    }

    public function index()
    {
        # code...
        $prizes = $this->prize_service->getAll();
        $prizes_grouped = $this->prize_collection_parser->groupPrizes($prizes);

        $data = compact('prizes', 'prizes_grouped');
        
        return view('admin.dashboard.index', $data);
    }

}
