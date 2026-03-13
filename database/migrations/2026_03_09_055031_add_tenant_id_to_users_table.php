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
        Schema::table('users', function (Blueprint $table) {
            $table->string('user_id')->after('id')->unique();
            $table->string('tenant_id')->after('user_id')->nullable();
            $table->string('user_role')->after('tenant_id')->default('user');
            $table->string('first_name')->after('user_role');
            $table->string('middle_name')->after('first_name')->nullable();
            $table->string('last_name')->after('middle_name');
            $table->boolean('is_active')->after('last_name')->default(true);
            $table->string('phone')->nullable()->after('is_active');
        });

        Schema::table('users', function (Blueprint $table) {
            $table->foreign('tenant_id')->references('tenant_id')->on('jtech_tenants')->onDelete('cascade')->onUpdate('cascade');
        });

        Schema::table('users', function (Blueprint $table) {
            $table->dropUnique(['email']);
            $table->unique(['tenant_id', 'email']);
            $table->index('tenant_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropUnique(['tenant_id', 'email']);
            $table->unique(['email']);
        });

        Schema::table('users', function (Blueprint $table) {
            $table->dropForeign(['tenant_id']);
            $table->dropColumn(['tenant_id', 'user_id', 'user_role', 'first_name', 'middle_name', 'last_name', 'is_active', 'phone']);
        });
    }
};
