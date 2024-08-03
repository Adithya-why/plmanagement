<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {

        //migration to create a registrations table
        //contains all students registered for companies
        //conatains company id and student id
        //so students registered for a given company or companies registered by a given student can be obtained easily


        Schema::create('registrations', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->unsignedBigInteger('companyid');
            $table->unsignedBigInteger('studentid');


            //foreign key linking the rows to a particular company and a student

            $table->foreign('companyid')->references('id')->on('companies');
            $table->foreign('studentid')->references('id')->on('students');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('registrations');
    }
};
