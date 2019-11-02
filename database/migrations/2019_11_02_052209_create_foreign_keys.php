<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateForeignKeys extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('draw_winners', function(Blueprint $table) {
            $table->foreign('member_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');

            $table->foreign('prize_id')
                ->references('id')
                ->on('prizes');

            $table->foreign('winning_number_id')
                ->references('id')
                ->on('winning_numbers')
                ->onDelete('cascade');
        });

        Schema::table('winning_numbers', function(Blueprint $table) {
            $table->foreign('member_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('draw_winners', function (Blueprint $table) {
            $table->dropForeign(['member_id']);
            $table->dropForeign(['prize_id']);
            $table->dropForeign(['winning_number_id']);
        });

        Schema::table('winning_numbers', function (Blueprint $table) {
            $table->dropForeign(['member_id']);
        });
    }
}
