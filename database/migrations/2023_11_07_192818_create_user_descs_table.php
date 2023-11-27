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
        Schema::create('user_descs', function (Blueprint $table) {
            $table->id();
            $table->foreignID('user_id')->constrained() ->onDelete('cascade');;
            $table->enum('roles', ['fisioterapis','dokter', 'admin','pasien'])->default('pasien');
            $table->string('no_telp')->nullable;
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_descs');
    }
};
