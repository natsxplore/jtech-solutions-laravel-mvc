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
        Schema::create('jtech_warehouses', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('warehouse_id')->unique();
            $table->string('tenant_id');
            $table->string('store_id');

            $table->string('warehouse_name');
            $table->text('warehouse_description')->nullable();
            $table->string('address')->nullable();
            $table->string('city')->nullable();
            $table->string('province')->nullable();
            
            $table->boolean('is_main')->default(true);
            $table->boolean('is_active')->default(true);

            $table->foreign('tenant_id')->references('tenant_id')->on('jtech_tenants')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('store_id')->references('store_id')->on('jtech_stores')->onDelete('cascade')->onUpdate('cascade');

            $table->index(['tenant_id', 'store_id']);
            $table->index(['tenant_id', 'is_active']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jtech_warehouses');
    }
};
