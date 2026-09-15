<?php

use App\Models\Christian;
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
        Schema::create('christians', function (Blueprint $table) {
            $table->id();
            $table->text('title');
            $table->text('description')->nullable();
            $table->timestamps();
        });

        Christian::create([
            'title' => 'Kristen',
        ]);
        Christian::create([
            'title' => 'Belum Kristen',
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('christians');
    }
};
