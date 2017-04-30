<?php


use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Decision_Aid\User;

class CreateSkinCancersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('skin_cancers', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('skin_option')->unsigned();
            $table->integer('skin_body_option')->unsigned();
            $table->integer('skin_body_moles_options')->unsigned();
            $table->integer('skin_body_cancer_options')->unsigned();
            $table->integer('user_id')->unsigned()->references('id')->on('users');   //user table one to one
            $table->integer('skin_cancer_score');
            $table->rememberToken();
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
        Schema::dropIfExists('skin_cancers');
    }
}
