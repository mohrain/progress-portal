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
        Schema::create('current_parliamentary_parties', function (Blueprint $table) {
            $table->id();
            $table
                ->unsignedBigInteger('parliamentary_party_id')
                ->constrained('parliamentary_parties')
                ->cascadeOnDelete();
            $table->integer('male_directly')->default(0);
            $table->integer('male_proportionate')->default(0);
            $table->integer('female_directly')->default(0);
            $table->integer('female_proportionate')->default(0);
            $table->smallInteger('position')->nullable();
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
        Schema::dropIfExists('current_parliamentary_parties');
    }
};
