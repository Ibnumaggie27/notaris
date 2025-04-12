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
        Schema::create('pengajuan_ajbs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('users_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('objekTanah_id')->constrained('objek_tanahs')->onDelete('cascade');
            $table->foreignId('berkas_id')->constrained('berkas_ajbs')->onDelete('cascade');
            $table->foreignId('penjual_id')->constrained('penjuals')->onDelete('cascade');
            $table->foreignId('pembeli_id')->constrained('pembelis')->onDelete('cascade');
            $table->foreignId('saksi_id')->constrained('saksis')->onDelete('cascade');
            $table->bigInteger('harga_transaksi_tanah')->nullable();
            $table->date('tanggal_pengajuan')->nullable();
            $table->enum('status', ['pengajuan', 'proses','selesai','tolak'])->default('pengajuan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengajuan_ajbs');
    }
};
