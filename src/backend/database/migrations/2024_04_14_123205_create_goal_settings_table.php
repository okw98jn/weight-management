<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class() extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('goal_settings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->comment('ユーザーID');
            $table->decimal('start_weight', 4, 1)->comment('開始体重');
            $table->decimal('goal_weight', 4, 1)->comment('目標体重');
            $table->boolean('is_current_goal')->default(false)->comment('現在設定中の目標か');
            $table->timestamps();
            $table->softDeletes();
            $table->comment('目標設定');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('goal_settings');
    }
};
