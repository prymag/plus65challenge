<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWinningNumbersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('winning_numbers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('number', 4)->unique();
            $table->unsignedBigInteger('member_id');
            $table->timestamps();

            $table->unique(array('number', 'member_id'), 'unique_user_number');
        });

        Schema::table('winning_numbers', function(Blueprint $table) {
            $table->foreign('member_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');;
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('winning_numbers');
    }
}
