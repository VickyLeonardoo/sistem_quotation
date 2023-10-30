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
        Schema::create('quotations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('perusahaan_id')->references('id')->on('perusahaans');
            $table->string('quotationNo');
            $table->date('tglQuotation');
            $table->decimal('total', 15, 2)->nullable();
            $table->enum('status', ['0', '1','2'])->default('0');
            $table->boolean('is_invoice')->default(false);
            $table->boolean('is_email')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('quotations');
    }
};
