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
        Schema::table('channel_access_requests', function (Blueprint $table) {
            $table->foreignIdFor(\App\Models\ContactChannel::class)->constrained();
            $table->foreignIdFor(\App\Models\Student::class)->constrained();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('channel_access_requests', function (Blueprint $table) {
            $table->dropForeignIdFor(\App\Models\ContactChannel::class)->constrained();
            $table->dropForeignIdFor(\App\Models\Student::class)->constrained();
        });
    }
};
