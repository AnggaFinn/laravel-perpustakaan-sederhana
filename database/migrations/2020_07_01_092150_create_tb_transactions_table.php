<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTbTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_transactions', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('anggota_id')->unsigned();
            $table->foreign('anggota_id')->references('id')->on('tb_members')->onDelete('cascade');
            $table->bigInteger('buku_id')->unsigned();
            $table->foreign('buku_id')->references('id')->on('tb_books')->onDelete('cascade');
            $table->date('tgl_pinjam');
            $table->date('tgl_kembali');
            $table->enum('status', ['dipinjam', 'sudah kembali']);
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
        Schema::dropIfExists('tb_transactions');
    }
}
