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
        Schema::create('users', function($table)
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
            $table->integer('one_yr');
            $table->integer('five_yr');
            $table->integer('ten_yr');
            $table->integer('tx_year');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('users')
    }
}
