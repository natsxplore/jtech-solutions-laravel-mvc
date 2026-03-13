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
        Schema::create('jtech_tenants', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('tenant_id')->unique();
            $table->string('company_name');
            $table->string('address')->nullable();
            $table->string('city')->nullable();
            $table->string('province')->nullable();
            $table->string('country')->default('Philippines');
            $table->string('zip_code')->nullable();
            $table->string('email');
            $table->string('subdomain', 63)->nullable()->unique();
            $table->string('phone')->nullable();
            $table->enum('status', ['trial', 'active', 'expired', 'cancelled', 'suspended'])->default('trial');
            $table->timestamp('trial_ends_at')->nullable();
            $table->json('settings')->nullable();

            $table->index('email');
            $table->index('company_name');
            $table->index('status');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jtech_tenants');
    }
};
