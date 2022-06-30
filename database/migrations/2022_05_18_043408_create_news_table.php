<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNewsTable extends Migration
{
    public function up()
    {
        Schema::create('news', function (Blueprint $table) {
            $table->id();
            $table->text('source');
            $table->longText('title');
            $table->longText('body');
            $table->longText('thumbnail');
            $table->integer('created_by');
            $table->timestamps();
        });
    }
    public function down()
    {
        Schema::dropIfExists('news');
    }
}
