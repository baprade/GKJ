<?php

use App\Models\Sex;
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
        Schema::create('sexes', function (Blueprint $table) {
            $table->id();
            $table->text('title');
            $table->text('description')->nullable();
            $table->timestamps();
        });

        Sex::create([
            'title' => 'Laki-laki',
        ]);

        Sex::create([
            'title' => 'Perempuan',
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sexes');
    }
};
