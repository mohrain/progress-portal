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
        Schema::create('ward_taxes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('fiscal_year_id')
                ->constrained('fiscal_years')
                ->onDelete('cascade');
            $table->foreignId('ward_id')->constrained()->onDelete('cascade');
            $table->foreignId('tax_title_id')->constrained('tax_titles')->onDelete('cascade');
            $table->decimal('amount', 10, 2)->default(0.00);
            $table->integer('month')->default(1);
            $table->foreignId('created_by')
                ->nullable() // make nullable
                ->constrained('users')
                ->onDelete('cascade');

            $table->foreignId('updated_by')
                ->nullable() // make nullable
                ->constrained('users')
                ->onDelete('cascade');

            $table->foreignId('approved_by')
                ->nullable() // make nullable
                ->constrained('users')
                ->onDelete('set null');

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
        Schema::dropIfExists('ward_taxes');
    }
};
