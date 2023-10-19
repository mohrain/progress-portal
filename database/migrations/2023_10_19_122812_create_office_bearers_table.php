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
        Schema::create('office_bearers', function (Blueprint $table) {
            $table->id();
            $table
                ->unsignedBigInteger('election_id')
                ->constrained('elections')
                ->cascadeOnDelete();
            $table
                ->unsignedBigInteger('member_id')
                ->constrained('members')
                ->cascadeOnDelete();
            $table->boolean('designation')->default(true);
            $table->string('start');
            $table->string('end')->nullable();
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
        Schema::dropIfExists('office_bearers');
    }
};
