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
        Schema::create('information_officers', function (Blueprint $table) {
            $table->id();
            $table
                ->unsignedBigInteger('employee_designation_id')
                ->constrained('employee_designations')
                ->cascadeOnDelete();
            $table
                ->unsignedBigInteger('employee_id')
                ->constrained('employees')
                ->cascadeOnDelete();
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
        Schema::dropIfExists('information_officers');
    }
};
