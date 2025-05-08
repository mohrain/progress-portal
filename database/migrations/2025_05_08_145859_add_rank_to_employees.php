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
        Schema::table('employees', function (Blueprint $table) {
            //
            $table->unsignedBigInteger('rank_id')->nullable()->after('id');
            $table->foreign('rank_id')->references('id')->on('ranks')->onDelete('set null');
            $table->string('symbol_no')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('employees', function (Blueprint $table) {
            //
            $table->dropForeign(['rank_id']);
            $table->dropColumn('rank_id');
            $table->dropColumn('symbol_no');
        });
    }
};
