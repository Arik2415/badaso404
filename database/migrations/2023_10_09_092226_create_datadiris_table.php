<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('datadiri', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('nama');
            $table->string('nik');
            $table->enum('jenis_pegawai', ['Tenaga Pendidik', 'Tenaga Kependidikan']);
            $table->enum('status_pegawai', ['NonPNS', 'PNS']);
            $table->string('unit');
            $table->string('sub_unit');
            $table->enum('pendidikan', ['SLTA', 'S1', 'S2', 'S3']);
            $table->string('tanggal_lahir');
            $table->string('tempat_lahir');
            $table->enum('jenis_kelamin', ['Laki-laki', 'Perempuan', 'Waria']);
            $table->string('agama');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('datadiri');
    }
};
