<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMasuksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('masuks', function (Blueprint $table) {
            $table->id();
            // $table->string('nama_produk');
            $table->unsignedBigInteger('produk_id');
            $table->foreign('produk_id')->references('id')->on('produks')->onDelete('cascade');
            // $table->text('deskripsi');
            // $table->integer('harga');
            $table->integer('jumlah_produk');
            // $table->string('gambar')->nullable();
            // $table->unsignedBigInteger('kategori_id');
            // $table->foreign('kategori_id')->references('id')->on('kategoris');
            // $table->foreignId('kategori_id')->constrained();
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
        Schema::dropIfExists('masuks');
    }
}
