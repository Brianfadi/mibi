<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('live_sessions', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->unique();
            $table->text('description')->nullable();
            $table->string('image')->nullable();
            $table->date('session_date');
            $table->time('start_time');
            $table->time('end_time')->nullable();
            $table->string('timezone', 100)->nullable();
            $table->string('meeting_link')->nullable();
            $table->integer('max_participants')->nullable();
            $table->boolean('is_free')->default(true);
            $table->decimal('price', 10, 2)->nullable();
            $table->string('session_type')->default('live'); // live, webinar, workshop
            $table->boolean('is_active')->default(true);
            $table->json('metadata')->nullable();
            $table->timestamps();
        });

        Schema::create('live_session_user', function (Blueprint $table) {
            $table->id();
            $table->foreignId('live_session_id')->constrained()->cascadeOnDelete();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->boolean('attended')->default(false);
            $table->timestamp('registered_at');
            $table->timestamps();
            $table->unique(['live_session_id', 'user_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('live_session_user');
        Schema::dropIfExists('live_sessions');
    }
};
