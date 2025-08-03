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
        Schema::create('reservations', function (Blueprint $table) {
            $table->id();
            //user_idという外部キー作成->constrained()により、usersテーブルのidを参照
            //->onDelete("cascade")により、ユーザーが削除されたら、その人の予約も自動的に削除
            $table->foreignId("user_id")->constrained()->onDelete("cascade");
            $table->date("date");
            $table->time("time");
            $table->unsignedInteger("num_people");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reservations');
    }
};
