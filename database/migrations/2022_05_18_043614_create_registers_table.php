<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRegistersTable extends Migration
{
    public function up()
    {
        Schema::create('registers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->string('nik', 16);
            $table->string('name');
            $table->string('phone', 16);
            $table->string('kk');
            $table->string('akta');
            $table->string('st');
            $table->text('reason')->nullable();
            $table->date('tanggal_diambil')->nullable();
            $table->time('jam_diambil')->nullable();
            $table->string('lokasi')->nullable();
            $table->integer('verified_by');
            $table->timestamp('verified_at')->nullable();
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users')->cascadeOnDelete();
        });
    }
    public function down()
    {
        Schema::dropIfExists('registers');
    }
}
