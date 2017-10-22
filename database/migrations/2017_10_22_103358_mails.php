<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Mails extends Migration
{

    public function up()
    {
        Schema::create('mails', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('uid', false, true)->index();
            $table->string('sender');
            $table->string('subject');
            $table->text('message');
            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::dropIfExists('mails');
    }
}
