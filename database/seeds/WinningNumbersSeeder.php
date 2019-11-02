<?php

use App\Modules\Users\Member\MemberService;
use App\Modules\WinningNumber\WinningNumber as AppWinningNumber;
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

        $members = $member_service->getAll();
        
        $members->each(function($member) {
            factory(AppWinningNumber::class, rand(1,10))->create([
                'member_id' => $member->id
            ]);
        });

    }
}
