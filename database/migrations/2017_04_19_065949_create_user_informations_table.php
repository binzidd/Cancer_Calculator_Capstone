<?php

use Illuminate\Support\Facade;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserInformationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('user_informations', function (Blueprint $table) {
            $table->increments('id');
            $table->date('dob');
            $table->string('gender');
            $table->float('height');
            $table->float('weight');
            $table->integer('age'); // check this12
            $table->integer('user_id')->unsigned()->references('id')->on('users');
            $table->rememberToken();
            $table->timestamps();
          //  $table->dropColumn('user_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
       Schema::dropIfExists('user_informations');
        //Schema::drop('user_informations');
    }
}
