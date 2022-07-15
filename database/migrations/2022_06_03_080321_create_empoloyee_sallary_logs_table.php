<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmpoloyeeSallaryLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('empoloyee_sallary_logs', function (Blueprint $table) {
            $table->id();
            $table->integer('employee_id')->comment('employee_id=User_id');
            $table->integer('previous_salary')->nullable();
            $table->integer('present_salary')->nullable();
            $table->integer('increment_salary')->nullable();
            $table->date('effected_salary')->nullable();
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
        Schema::dropIfExists('empoloyee_sallary_logs');
    }
}
