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
        Schema::create('services', function (Blueprint $table) {
            $table->id();
            $table->foreignId('department')->constrained()->onUpdate('cascade')->onDelete('cascade');
            $table->string('eqptName');
            $table->string('serial');
            $table->string('model');
            $table->string('reportedBy');
            $table->string('telephone');
            $table->string('designation');
            $table->foreignId('user')->constrained()->onUpdate('cascade')->onDelete('cascade');
            $table->string('fault');
            $table->text('description');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('services');
    }
};
