<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCharitysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('charitys', function (Blueprint $table) {
                  $table->increments('id');
                  $table->string('charity_name',100);
                  $table->string('charity_desc',1024);
                  $table->string('address1',128);
                  $table->string('address2',128)->nullable();
                  $table->string('city',30);
                  $table->string('zipcode',10);
                  $table->string('phone1',20);
                  $table->string('state',30);
                  $table->string('country',30);
                  $table->integer('user_id');
                  $table->timestamps();
                  $table->unique(array('charity_name', 'user_id'));
          });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('charitys');
    }
}
