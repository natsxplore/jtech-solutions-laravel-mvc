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
        Schema::create('jtech_plans', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('plan_id')->unique();
            $table->string('plan_name');
            $table->string('slug')->unique();
            $table->text('plan_description');
            $table->decimal('price_monthly', 10, 2)->default(0);
            $table->decimal('price_yearly', 10, 2)->default(0);

            $table->integer('max_branches')->nullable(); // unlimited kapag naka null
            $table->integer('max_warehouses')->nullable(); // unlimited kapag naka null
            $table->integer('max_users')->nullable();
            $table->integer('max_products')->nullable(); // unlimited kapag naka null

            $table->boolean('has_multi_store')->default(false);
            $table->boolean('has_multi_warehouse')->default(false);
            $table->boolean('has_advanced_reporting')->default(false);
            $table->boolean('has_inventory_alerts')->default(false);
            $table->boolean('has_barcode_scanner')->default(false);

            $table->integer('trial_days')->default(14);
            $table->boolean('is_popular')->default(false);
            $table->boolean('is_active')->default(true);
            $table->json('permissions')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jtech_plans');
    }
};
