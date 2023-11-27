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
        Schema::create('course_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('course_id')->constrained() ->onDelete('cascade');;
            $table->float('duration');
            $table->float('position');
            $table->float('vout');
            $table->float('dorsimax');
            $table->float('plantarmax');
            $table->float('rom');
            $table->float('percentage');
            $table->float('step_amount');
            $table->float('step_duration');
            $table->float('step_per_second');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('course_details');
    }
};
