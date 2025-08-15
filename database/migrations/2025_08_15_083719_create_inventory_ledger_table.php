<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('inventory_ledger', function (Blueprint $table) {
            $table->id();
            $table->date('txn_date');
            $table->string('ref_type');
            $table->unsignedBigInteger('ref_id');
            $table->foreignId('item_id')->constrained('items');
            $table->foreignId('location_id')->constrained('locations');
            $table->foreignId('lot_id')->nullable()->constrained('lots');
            $table->enum('direction', ['IN', 'OUT']);
            $table->decimal('qty', 15, 3);
            $table->decimal('balance_after', 15, 3);
            $table->foreignId('created_by')->constrained('users');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('inventory_ledger');
    }
};
