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
        Schema::create('ward_recomendations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('fiscal_year_id')
                ->constrained('fiscal_years')
                ->onDelete('cascade');
            $table->foreignId('ward_id')
                ->constrained('wards')
                ->onDelete('cascade');
            $table->foreignId('recomendation_type_id')
                ->constrained('recomendation_types')
                ->onDelete('cascade');
            $table->integer('month')->default(0);
            $table->integer('total_application')->default(0);
            $table->integer('total_recomended')->default(0);
            $table->integer('total_darta')->default(0);
            $table->integer('total_chalani')->default(0);
            $table->text('remarks')->nullable();
            $table->string('file')->nullable();
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
        Schema::dropIfExists('ward_recomendations');
    }
};
