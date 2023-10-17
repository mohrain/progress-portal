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
        Schema::create('bills', function (Blueprint $table) {
            $table->id();
            $table->string('slug');
            $table->string('name');
            $table->string('convention');
            $table->string('year');
            $table->string('entry_number');
            $table->string('entry_date');

            $table
                ->unsignedBigInteger('bill_type_id')
                ->constrained('bill_types')
                ->cascadeOnDelete();
            $table
                ->unsignedBigInteger('ministry_id')
                ->constrained('ministries')
                ->cascadeOnDelete();

            $table
                ->unsignedBigInteger('member_id')
                ->constrained('members')
                ->cascadeOnDelete();

            $table
                ->unsignedBigInteger('bill_category_id')
                ->constrained('bill_categories')
                ->cascadeOnDelete();

            $table->string('gov_non_gov');
            $table->string('original_amendment');

            $table->boolean('suggestion_in_the_bill')->default(true);

            $table->string('distribution_to_members_date')->nullable();
            $table->string('representative_presented_in_assembly_date')->nullable();
            $table->string('general_discussion_date')->nullable();
            $table->string('weekly_in_assembly_discussion_date')->nullable();
            $table->string('weekly_in_committee_discussion_date')->nullable();
            $table->string('committee_report_submission_date')->nullable();
            $table->string('passed_by_assembly_date')->nullable();
            $table->string('assembly_rejected_date')->nullable();
            $table->string('repassed_date')->nullable();
            $table->string('authentication_date')->nullable();

            $table->string('entry_bill_file')->nullable();
            $table->string('certification_bill_file')->nullable();

            $table->string('status')->nullable();
            $table->longText('descriptions')->nullable();
            
            $table->boolean('active')->default(true);
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
        Schema::dropIfExists('bills');
    }
};
