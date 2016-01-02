<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransplantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {   
        // need to go ahead and migrate this table
        // also need to decide whether to use integers or strings for things like "ethnicity"
        Schema::create('transplants', function($table)
        {
            $table->boolean('lung');
            $table->boolean('heart');
            $table->boolean('heart_lung');
            $table->integer('age');
            $table->float('bmi');
            $table->integer('diagnosis'); 
            $table->integer('ethnicity');
            $table->integer('gender');
            $table->integer('inotropes');
            $table->integer('ventilator');
            $table->integer('ecmo');
            $table->boolean('one_yr');
            $table->boolean('five_yr');
            $table->boolean('ten_yr');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Schema::drop('users');
        Schema::drop('transplants');
    }
}
