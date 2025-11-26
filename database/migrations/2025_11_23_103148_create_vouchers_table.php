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
    Schema::create('vouchers', function (Blueprint $table) {
        $table->id();

        // Relasi ke tamu (guest)
        $table->foreignId('guest_id')->constrained('guests')->onDelete('cascade');

        // Kode unik voucher
        $table->string('code')->unique();

        // Diskon voucher (misal 10%)
        $table->integer('discount_percentage')->default(10);

        // Status voucher: unused, used, expired
        $table->string('status')->default('unused');

        // Waktu ketika voucher dipakai
        $table->timestamp('used_at')->nullable();

        // Staf yang men-scan / redeem voucher
        $table->foreignId('redeemed_by')->nullable()->constrained('users');

        // Expired time (opsional)
        $table->timestamp('expires_at')->nullable();

        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vouchers');
    }
};
