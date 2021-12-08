<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTamamlanmisOdemelerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tamamlanmis_odemeler', function (Blueprint $table) {
            $table->id();
            $table->string('kod');
            $table->double('tutar');
            $table->foreignId('cari_id');
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
        Schema::dropIfExists('tamamlanmis_odemeler');
    }
}
