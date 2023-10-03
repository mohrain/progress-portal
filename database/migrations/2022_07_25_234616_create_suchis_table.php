<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSuchisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('suchis', function (Blueprint $table) {
            $table->id();
            $table->string('token_no', 10)->nullable();
            $table->foreignId('fiscal_year_id')->nullable()->constrained();
            $table->string('reg_no_prefix')->nullable();
            $table->string('reg_no')->nullable()->index();
            $table->string('application_date')->nullable();
            $table->string('reg_date')->nullable();
            $table->date('reg_date_ad')->nullable();
            $table->string('name');
            $table->string('address')->nullable();
            $table->string('contact_person')->nullable();
            $table->string('contact')->nullable();
            $table->string('email')->nullable();
            $table->string('mobile')->nullable();
            $table->foreignId('suchi_type_id')->nullable()->constrained();
            $table->text('product_type')->nullable();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->string('receipt_no')->nullable();
            $table->string('receipt_amount')->nullable();
            // Documents
            $table->string('reg_cert')->nullable();
            $table->string('renew_cert')->nullable();
            $table->string('pan_cert')->nullable();
            $table->string('tax_cert')->nullable();
            $table->string('license_cert')->nullable();
            $table->string('receipt')->nullable();
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
        Schema::dropIfExists('suchis');
    }
}
