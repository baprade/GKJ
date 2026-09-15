<?php

use App\Models\Married;
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
        Schema::create('marrieds', function (Blueprint $table) {
            $table->id();
            $table->text('title');
            $table->text('description')->nullable();
            $table->timestamps();
        });

        Married::create([
            'title' => 'Menikah',
        ]);

        Married::create([
            'title' => 'Belum Menikah',
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('marrieds');
    }
};
