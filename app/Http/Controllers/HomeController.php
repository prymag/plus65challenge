<?php

namespace App\Http\Controllers;

use App\Modules\Prize\PrizeService;
use App\Modules\Prize\CollectionParser as PrizeCollectionParser;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    protected $prize_service;

    protected $prize_collection_parser;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(
        PrizeService $prize_service,
        PrizeCollectionParser $prize_collection_parser
    ) {
        $this->prize_service = $prize_service;
        $this->prize_collection_parser = $prize_collection_parser;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $prizes = $this->prize_service->getAll();
        $prizes_grouped = $this->prize_collection_parser->groupPrizes($prizes);

        $data = compact('prizes_grouped');

        return view('home', $data);
    }
}
