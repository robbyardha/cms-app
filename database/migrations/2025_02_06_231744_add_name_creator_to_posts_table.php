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
        Schema::table('posts', function (Blueprint $table) {
            $table->string('created_by')->after('content')->nullable();
            $table->string('updated_by')->after('created_by')->nullable();
            $table->string('is_published')->after('updated_by')->default(0);
            $table->string('published_by')->after('is_published')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('posts', function (Blueprint $table) {
            $table->dropColumn('created_by');
            $table->dropColumn('updated_by');
            $table->dropColumn('is_published');
            $table->dropColumn('published_by');
        });
    }
};
