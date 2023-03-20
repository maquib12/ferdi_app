<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLoanPersonalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('loan_personals', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('loan_amount_id');
            $table->foreign('loan_amount_id')->references('id')->on('loan_amounts')->onDelete('cascade')->onUpdate('CASCADE');
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('other_name')->nullable();
            $table->string('gender')->nullable();
            $table->string('state_of_origin')->nullable();
            $table->integer('phone_no')->nullable();
            $table->string('email')->nullable();
            $table->date('date_of_birth')->nullable();
            $table->string('marital_status')->nullable();
            $table->text('address')->nullable();
            $table->string('nearest_landmark')->nullable();
            $table->string('country')->nullable();
            $table->string('state')->nullable();
            $table->string('BVN')->nullable();
            $table->string('government_issued_id')->nullable();
            $table->string('id_number')->nullable();
            $table->string('institute_name')->nullable();
            $table->string('qualification')->nullable();
            $table->string('course')->nullable();
            $table->date('awarded_date')->nullable();
            $table->string('company_name')->nullable();
            $table->text('company_address')->nullable();
            $table->text('company_street_address')->nullable();
            $table->string('company_landmark')->nullable();
            $table->string('company_country')->nullable();
            $table->string('company_state')->nullable();
            $table->string('name_of_association')->nullable();
            $table->text('address_of_association')->nullable();
            $table->string('strength1')->nullable();
            $table->string('strength2')->nullable();
            $table->string('strength3')->nullable();
            $table->string('opportunity1')->nullable();
            $table->string('opportunity2')->nullable();
            $table->string('opportunity3')->nullable();
            $table->string('weakness1')->nullable();
            $table->string('weakness2')->nullable();
            $table->string('weakness3')->nullable();
            $table->string('threats1')->nullable();
            $table->string('threats2')->nullable();
            $table->string('threats3')->nullable();
            $table->string('owner_name')->nullable();
            $table->string('owner_share')->nullable();
            $table->string('manager_name')->nullable();
            $table->string('manager_responsibility')->nullable();
            $table->string('sector_engaged')->nullable();
            $table->string('sub_sector')->nullable();
            $table->string('aspect')->nullable();
            $table->string('nature_of_your_business')->nullable();
            $table->string('stage_of_business')->nullable();
            $table->string('totals_years')->nullable(); 
            $table->integer('status')->nullable()->comment('0 for draft, 1 for save');
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
        Schema::dropIfExists('loan_personals');
    }
}
