<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('designation')->nullable();
            $table->string('address',255)->nullable();
            $table->string('contact')->nullable();
            $table->date('doj')->nullable();
            $table->string('photo')->nullable();
            $table->string('dox')->nullable();
            $table->string('paytype')->nullable();
            $table->integer('salary')->default(0);
            $table->string('status');
            $table->string('note')->nullable();
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
}
