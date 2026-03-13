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
        Schema::create('jtech_stores', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('store_id')->unique();
            $table->string('tenant_id');
            $table->string('tax_id')->nullable();
            $table->string('branch_name');
            $table->string('address');
            $table->string('city');
            $table->string('province')->nullable();
            $table->string('country')->default('Philippines');
            $table->string('zip_code')->nullable();
            $table->string('phone')->nullable();
            $table->string('email')->nullable();
            
            $table->string('manager_name')->nullable();
            $table->boolean('is_active')->default(true);
            $table->boolean('is_main')->default(false);
            $table->json('settings')->nullable();

            $table->timestamp('activated_at')->nullable();
            $table->timestamp('deactivated_at')->nullable();

            $table->foreign('tenant_id')->references('tenant_id')->on('jtech_tenants')->onDelete('cascade')->onUpdate('cascade');

            $table->index(['tenant_id', 'is_active']);
            $table->index(['tenant_id', 'city']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jtech_stores');
    }
};
