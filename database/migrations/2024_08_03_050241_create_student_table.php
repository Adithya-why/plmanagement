<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     * 
     */
    public function up(): void
    
    {

        //create a table with student details
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('deptno');
            $table->string('department');
            $table->decimal('cgpa', 4, 2);
            $table->unsignedBigInteger('userid');
            


            //foreingkey userid
            //every student has a username and password
            //the userid of that student is linked here

            $table->foreign('userid')->references('id')->on('users');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('student');
    }
};
