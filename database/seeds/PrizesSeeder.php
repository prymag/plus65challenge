<?php

use App\Modules\Prize\PrizeService;
use Illuminate\Database\Seeder;

class PrizesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $prize_service = App::make(PrizeService::class);
        $prize_service->seed();
    }
}
