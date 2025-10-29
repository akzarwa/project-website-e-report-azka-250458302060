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
        Schema::create('complains_', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('category_id')->constrained('categorys')->onDelete('cascade');
            $table->string('no_aduan')->unique();
            $table->string('judul');
            $table->string('keterangan');
            $table->string('image')->nullable();
            $table->string('lokasi');
            $table->string('tanggal_aduan');
            $table->enum('status', ['pending', 'in_progress', 'resolve', 'rejected'])->default('pending');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('complains_');
    }
};
