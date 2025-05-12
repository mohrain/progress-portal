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
        Schema::table('wards', function (Blueprint $table) {
            $table->longText('description')->nullable()->after('name_en');
            $table->string('logo')->nullable()->after('description');
            $table->boolean('status')->default(true)->after('logo');
            $table->longText('work_duty')->nullable()->after('description');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('wards', function (Blueprint $table) {
            $table->dropColumn('description');
            $table->dropColumn('work_duty');
            $table->dropColumn('logo');
            $table->dropColumn('status');
        });
    }
};
