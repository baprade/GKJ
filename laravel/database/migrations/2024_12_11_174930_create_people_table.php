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
        Schema::create('people', function (Blueprint $table) {
            $table->id();
            $table->date('sidi')->nullable();
            $table->text('nikah_by')->nullable();
            $table->date('nikah_date')->nullable();
            $table->date('passed_date')->nullable();
            $table->text('parrent')->nullable();
            $table->text('spouse')->nullable();
            $table->integer('nia')->default(0);
            $table->text('from')->nullable();
            $table->text('to')->nullable();
            $table->text('note')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('people');
    }
};
