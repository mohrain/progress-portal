<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bill_suggestion_section_wises', function (Blueprint $table) {
            $table->id();
            $table
                ->unsignedBigInteger('bill_suggestion_id')
                ->constrained('bill_suggestions')
                ->cascadeOnDelete();
            $table->string('section')->nullable();
            $table->string('sub_section')->nullable();
            $table->string('sec')->nullable();
            $table->string('current_arrangement')->nullable();
            $table->string('procedure_of_amendment')->nullable();
            $table->string('reason')->nullable();
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
        Schema::dropIfExists('bill_suggestion_section_wises');
    }
};
