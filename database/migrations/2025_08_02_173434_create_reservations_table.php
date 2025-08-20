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
            //mullable()により、user_idがnullでも予約可能
            //user_idという外部キー作成->constrained()により、usersテーブルのidを参照
            //->onDelete("cascade")により、ユーザーが削除されたら、その人の予約も自動的に削除
            $table->foreignId("user_id")->nullable()->constrained()->onDelete("cascade");
            $table->string("name");
            $table->string("email");
            $table->date("reserved_date");
            $table->time("reserved_time");
            $table->unsignedInteger("number_of_people")->nullable();
            $table->text("note")->nullable();
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
