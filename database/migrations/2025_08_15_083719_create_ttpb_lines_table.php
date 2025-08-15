<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('ttpb_lines', function (Blueprint $table) {
            $table->id();
            $table->foreignId('ttpb_id')->constrained('ttpbs')->cascadeOnDelete();
            $table->foreignId('item_id')->constrained('items');
            $table->foreignId('lot_id')->nullable()->constrained('lots');
            $table->decimal('qty_requested', 15, 3);
            $table->decimal('qty_actual', 15, 3)->default(0);
            $table->decimal('loss_qty', 15, 3)->default(0);
            $table->decimal('loss_percent', 5, 2)->default(0);
            $table->integer('coly')->nullable();
            $table->string('spec')->nullable();
            $table->string('remarks')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('ttpb_lines');
    }
};
