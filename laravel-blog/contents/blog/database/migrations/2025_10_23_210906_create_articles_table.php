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
        Schema::create('articles', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->constrained()->nullOnDelete('cascade')->comment('user_id');
            $table->string('title')->comment('タイトル');
            $table->text('body')->comment('本文');
            $table->foreignId('created_by')->nullable()->constrained('users')->nullOnDelete()->comment('作成者');
            $table->foreignId('updated_by')->nullable()->constrained('users')->nullOnDelete()->comment('更新者');
            $table->datetime('created_at')->comment('作成日時');
            $table->datetime('updated_at')->nullable()->comment('更新日時');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('articles');
    }
};
