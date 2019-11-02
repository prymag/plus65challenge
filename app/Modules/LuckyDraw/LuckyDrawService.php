<?php

namespace App\Modules\LuckyDraw;

use App\Modules\Base\CollectionParser;
use App\Modules\LuckyDraw\DrawGenerators\AbstractDrawGenerator;
use App\Modules\LuckyDraw\DrawGenerators\GrandPrize;
use App\Modules\LuckyDraw\DrawGenerators\RandomPrize;
use App\Modules\Prize\Prize;
use App\Modules\Prize\PrizeService;
use Illuminate\Foundation\Application as App;


class LuckyDrawService {

    protected $app;

    protected $prize_service;

    protected $draw_winner_service;

    public function __construct(
        App $app,
        PrizeService $prize_service
    ) {
        # code...
        $this->app = $app;
        $this->prize_service = $prize_service;
    }

    public function generatePrizes()
    {
        # code...
        $collection = $this->prize_service->getActivePrizes();

        foreach ($collection as $prize) {
            $this->generatePrize($prize);
        }
    }

    public function generatePrize(Prize $prize)
    {
        # code...
        $generator = $this->getGenerator($prize);

        if ($generator) {
            $generator->generate($prize);
        }
    }

    /**
     * Get a Draw Generator
     *
     * @param Prize $prize
     * @return AbstractDrawGenerator | Null
     */
    public function getGenerator(Prize $prize)
    {
        # code...
        $key = $prize->key;
    
        switch ($key) {
            case 'grand_prize':
                return $this->app->make(GrandPrize::class);
            default:
                return $this->app->make(RandomPrize::class);
        }
    }

}