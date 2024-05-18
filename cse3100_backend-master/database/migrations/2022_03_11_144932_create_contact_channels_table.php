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
        Schema::create('contact_channels', function (Blueprint $table) {
            $table->id();
            $table->text('channel_data'); //json string
            /**
             * [
             * place_name,
             * position,
             * web_link,
             * enroll_start,
             * enroll_end,
             * comment
             * ]
             */
            //$table->string('channel_link');
            $table->boolean('require_permission')->default(false);
            $table->integer('type')->default(1);
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
        Schema::dropIfExists('contact_channels');
    }
};
