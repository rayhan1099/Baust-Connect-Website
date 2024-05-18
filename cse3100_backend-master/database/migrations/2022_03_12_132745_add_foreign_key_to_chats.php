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
        Schema::table('chats', function (Blueprint $table) {
            $table->foreignIdFor(\App\Models\Admin::class)->nullable()->constrained();
            $table->foreign('from')->references('id')->on('students');
            $table->foreign('to')->references('id')->on('students');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('chats', function (Blueprint $table) {
            $table->dropForeignIdFor(\App\Models\Admin::class)->nullable()->constrained();
            $table->dropForeign('from');
            $table->dropForeign('to');
        });
    }
};
