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
        Schema::create('berkas_ajbs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('file_ktp_penjual');
            $table->string('file_ktp_istri_penjual');
            $table->string('file_kk_penjual');
            $table->string('file_ktp_pembeli');
            $table->string('file_kk_pembeli');
            $table->string('file_akta_nikah');
            $table->string('file_sertifikat');
            $table->string('file_bukti_pbb');
            $table->string('file_imb');
            $table->string('file_persetujuan');
            $table->string('file_dokumen_lainnya');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('berkas_ajbs', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
            $table->dropColumn('user_id');
        });
    }
};
