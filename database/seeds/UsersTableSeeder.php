<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        factory(App\Modules\Users\Admin\Admin::class, 1)->create();
        factory(App\Modules\Users\Member\Member::class, 6)->create();
    }
}
