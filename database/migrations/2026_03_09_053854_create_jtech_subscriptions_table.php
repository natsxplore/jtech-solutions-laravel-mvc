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
        Schema::create('jtech_subscriptions', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('subscription_id')->unique();
            $table->string('tenant_id');
            $table->string('plan_id');

            $table->enum('status', ['trial', 'active', 'expired', 'cancelled'])
                ->default('trial');
            $table->enum('billing_cycle', ['monthly', 'yearly'])
                ->default('monthly');

            $table->timestamp('trial_ends_at')->nullable();
            $table->timestamp('starts_at')->nullable();
            $table->timestamp('ends_at')->nullable();
            $table->timestamp('cancelled_at')->nullable();

            $table->string('payment_method')->nullable();
            $table->string('payment_reference')->nullable();
            $table->decimal('amount_paid', 10, 2)->nullable();
            $table->string('transaction_id')->nullable();
            
            $table->foreign('tenant_id')->references('tenant_id')->on('jtech_tenants')
                ->onDelete('cascade')->onUpdate('cascade');

            $table->foreign('plan_id')->references('plan_id')->on('jtech_plans')
                ->onDelete('cascade')->onUpdate('cascade');

            $table->index(['tenant_id', 'status', 'ends_at']);
            $table->index(['status', 'trial_ends_at']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jtech_subscriptions');
    }
};
