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
        Schema::create('penjuals', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('nama_penjual');
            $table->string('nik_penjual')->unique();
            $table->string('tgl_lahir_penjual');
            $table->string('tempat_lahir_penjual');
            $table->string('nama_istri_penjual');
            $table->string('nik_istri_penjual')->unique();
            $table->date('tgl_lahir_istri_penjual');
            $table->string('tempat_lahir_istri_penjual');
            $table->text('alamat_penjual');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('penjuals', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
            $table->dropColumn('user_id');
        });
    }
};
