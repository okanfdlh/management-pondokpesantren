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
        Schema::create('santris', function (Blueprint $table) {
            $table->id();
            // $table->string('foto')->nullable();
            $table->string('nis')->unique();     
            $table->string('nama');
            $table->string('asrama');
            $table->string('kamar');
            $table->string('kelas');
            $table->enum('jenis_kelamin', ['L', 'P']);
            // $table->text('tempat_lahir');
            $table->date('tanggal_lahir');
            $table->text('alamat');
            $table->string('kelurahan');
            $table->string('kabupaten');
            $table->string('tahun_ajaran');      
            $table->enum('status', ['Aktif', 'Lulus', 'Cuti']);
            // Tambahkan ini di migration `santris`
            $table->foreignId('wali_id')->nullable()->constrained('users')->onDelete('set null');
            $table->string('no_hp_walisantri');
            // $table->enum('status_keluarga', ['Lengkap', 'Yatim', 'Piatu','Yatim_Piatu']);
            $table->timestamps(); 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('santris');
    }
};
