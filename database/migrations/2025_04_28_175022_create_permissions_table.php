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
        Schema::create('permissions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('santri_id')->constrained()->onDelete('cascade'); 
            $table->enum('status', ['Diproses', 'Diizinkan', 'Ditolak']);
            $table->enum('kategori_perizinan', ['Meninggal', 'Sakit', 'Haji/Umroh', 'Menikah', 'Aqiqah/Khitanan', 'Wisuda', 'Tugas/Kegiatan']);
 // Being Accepted, Rejected, or InProcessing
            $table->text('reason');
            $table->date('request_date');
            $table->date('tanggal_selesai');
            $table->text('catatan');
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('permissions');
    }
};
