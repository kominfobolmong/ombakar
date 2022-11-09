<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBerkasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('berkas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('surat_permohonan_id')->constrained();
            $table->string('stblkk');
            $table->string('sipi_sikpi');
            $table->string('slo');
            $table->string('estimasi_produksi_per_trip');
            $table->string('jadwal_rencana_pengisian_minyak_solar');
            $table->string('realisasi_pengisian_bbm_sebelumnya');
            $table->string('estimasi_sisa_minyak_solar_dikapal');
            $table->string('surat_kuasa');
            $table->string('produksi_per_jenis_ikan');
            $table->string('spb');
            $table->string('daftar_abk');
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
        Schema::dropIfExists('berkas');
    }
}
