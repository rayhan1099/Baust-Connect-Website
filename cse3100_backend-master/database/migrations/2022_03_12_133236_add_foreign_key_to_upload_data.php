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
        Schema::table('upload_data', function (Blueprint $table) {
            $table->foreignIdFor(\App\Models\Admin::class)->constrained();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('upload_data', function (Blueprint $table) {
            $table->dropForeignIdFor(\App\Models\Admin::class)->constrained();

        });
    }
};
