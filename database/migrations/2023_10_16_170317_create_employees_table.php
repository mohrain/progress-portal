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
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->string('slug');
            $table->string('name');
            $table->string('name_english');
            $table->string('profile')->nullable();
            $table->string('gender');
            $table->string('dob')->nullable();

            $table->string('permanent_address')->nullable();
            $table->string('permanent_address_district')->nullable();

            $table->string('temporary_address')->nullable();
            $table->string('temporary_address_district')->nullable();

            $table->string('mobile')->nullable();
            $table->string('email')->nullable();

            $table->string('father_name')->nullable();
            $table->string('mother_name')->nullable();
            $table->string('spouse_name')->nullable();
            $table->string('child')->nullable();

            $table->string('mother_tongue')->nullable();
            $table->string('religion')->nullable();
            $table->string('education')->nullable();
       
            $table->string('designation')->nullable();
            $table->string('branch')->nullable();
            $table->smallInteger('position')->nullable();
            $table->longText('descriptions')->nullable();
            $table->boolean('status')->default(true);
            $table->unsignedBigInteger('created_by')->nullable();
            $table->unsignedBigInteger('updated_by')->nullable();
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
        Schema::dropIfExists('employees');
    }
};
