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
            $table->unsignedBigInteger('crm_id')->nullable()->after('region');
            $table->string('crm_status')->nullable()->after('region');
            $table->boolean('crm_sync_errors')->default(0)->after('region');
            $table->datetime('crm_synced_at')->nullable()->after('updated_at');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['crm_id', 'crm_status', 'crm_sync_errors', 'crm_synced_at']);
        });
    }
};
