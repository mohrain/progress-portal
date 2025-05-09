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
        Schema::table('meetings', function (Blueprint $table) {
            //
            $table->unsignedBigInteger('meeting_type_id')->nullable()->after('id');
            $table->foreign('meeting_type_id')->references('id')->on('meeting_types')->onDelete('set null');
            $table->boolean('for_mayor')->default(false);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('meetings', function (Blueprint $table) {
            //
            $table->dropForeign(['meeting_type_id']);
            $table->dropColumn('meeting_type_id');
            $table->dropColumn('for_mayor');
        });
    }
};
