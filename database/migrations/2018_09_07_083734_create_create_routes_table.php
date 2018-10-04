<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCreateRoutesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('create_routes', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->text('activities');
            $table->date('arrival');
            $table->date('departure');
            $table->integer('friends')->nullable();
            $table->longText('friends_info')->nullable();
            $table->integer('status')->default('0');
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
        Schema::dropIfExists('create_routes');
    }
}
