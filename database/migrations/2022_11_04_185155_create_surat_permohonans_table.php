<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSuratPermohonansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('surat_permohonans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('kapal_id')->constrained();
            $table->foreignId('penyalur_id')->constrained();
            $table->string('lama_operasional');
            $table->string('daerah_operasi');
            $table->integer('kebutuhan_bbm');
            $table->string('pengisian_bulan');
            $table->enum('status', ['Y', 'N'])->default('Y');
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
        Schema::dropIfExists('surat_permohonans');
    }
}
