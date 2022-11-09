<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSuratRekomendasisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('surat_rekomendasis', function (Blueprint $table) {
            $table->id();
            $table->foreignId('berkas_id')->constrained();
            $table->string('nomor_surat')->unique();
            $table->date('masa_berlaku');
            $table->date('tanggal');
            $table->string('tempat');
            $table->string('pembina');
            $table->string('nip')->unique();
            $table->string('pdf')->nullable();
            $table->string('qrcode')->nullable();
            $table->enum('status', ['Y', 'N'])->default('N');
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
        Schema::dropIfExists('surat_rekomendasis');
    }
}
