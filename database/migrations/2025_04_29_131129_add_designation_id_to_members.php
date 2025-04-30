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
        Schema::table('members', function (Blueprint $table) {
            //
            $table->unsignedBigInteger('office_bearer_designation_id')->nullable(); // or remove nullable() if required
            $table->foreign('office_bearer_designation_id')->references('id')->on('office_bearer_designations')->onDelete('cascade');
            $table->integer('ward_number')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('members', function (Blueprint $table) {
            //
            $table->dropForeign(['office_bearer_designation_id']);
            $table->dropColumn('office_bearer_designation_id');
            $table->dropColumn('ward_number');
        });
    }
};
