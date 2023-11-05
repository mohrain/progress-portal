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
        Schema::create('committee_secretaries', function (Blueprint $table) {
            $table->id();
            $table->foreignId('committee_id')->constrained('committees');
            $table->unsignedBigInteger('employee_id')->nullable();
            $table->string('designation')->nullable();
            $table->string('position')->nullable();
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
        Schema::dropIfExists('committee_secretaries');
    }
};
