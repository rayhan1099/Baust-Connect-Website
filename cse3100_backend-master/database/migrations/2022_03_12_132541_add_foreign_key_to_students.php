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
        Schema::table('students', function (Blueprint $table) {
            $table->foreignIdFor(\App\Models\Address::class)->nullable()->constrained();
            $table->foreignIdFor(\App\Models\Department::class)->constrained();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('students', function (Blueprint $table) {
            $table->dropForeignIdFor(\App\Models\Address::class)->constrained();
            $table->dropForeignIdFor(\App\Models\Department::class)->constrained();
        });
    }
};
