<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLaporanKeluarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('laporankeluars', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('produk_id');
            $table->foreign('produk_id')->references('id')->on('produks');
            $table->integer('jumlah_produk');
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
        Schema::dropIfExists('laporankeluars');
    }
}
