<?php

use App\Modules\Users\Member\MemberService;
use App\Modules\WinningNumber\WinningNumber;
use App\Modules\WinningNumber\WinningNumberService;
use Illuminate\Database\Seeder;

class WinningNumbersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $member_service = App::make(MemberService::class);
        $winning_number_service = App::make(WinningNumberService::class);
        $member_service->seed();
        $members = $member_service->getAll();
        $winning_number_service->seed($members);
    }
}
