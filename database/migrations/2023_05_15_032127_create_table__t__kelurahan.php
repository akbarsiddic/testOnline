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
        Schema::create('table__t__kelurahan', function (Blueprint $table) {
            $table->id();
            $table->text('kode');
            $table->text('nama_kelurahan');
            $table->foreignId('kecamatan_id')->constrained('table__t__kecamatan');
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
        Schema::dropIfExists('table__t__kelurahan');
    }
};
