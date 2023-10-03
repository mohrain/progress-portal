<?php

use App\SuchiType;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSuchiTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('suchi_types', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->timestamps();
        });

        SuchiType::upsert(
            [
                ['title' => 'कन्सल्टेन्सी / निर्माण सेवा'],
                ['title' => 'व्यवसाय / उद्योग'],
                ['title' => 'संचार / विज्ञापन एजेन्सी'],
                ['title' => 'सेवामुलक संघ संस्थाहरु'],
                ['title' => 'अन्य'],
            ],
            ['title'],
            ['title']
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('suchi_types');
    }
}
