<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('follower_user', function (Blueprint $table) {
            $table->id()->unique();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            //Here we are telling the name of table 'users' because follower is not any model
            //If you follow the convention laravel automatically detects it by convnetion
            $table->foreignId('follower_id')->constrained('users')->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('follower_user');
    }
};
