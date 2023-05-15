<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('table__t__pegawai', function (Blueprint $table) {
            $table->id();
            $table->text('nama_pegawai');
            $table->text('tempat_lahir');
            $table->date('tanggal_lahir');
            $table->text('jenis_kelamin');
            $table->text('agama');
            $table->text('alamat');
            $table->foreignId('kelurahan_id')->constrained('table__t__kelurahan');
            $table->foreignId('kecamatan_id')->constrained('table__t__kecamatan');
            $table->foreignId('provinsi_id')->constrained('table__t__provinsi');
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
        Schema::dropIfExists('table__t__pegawai');
    }
};
