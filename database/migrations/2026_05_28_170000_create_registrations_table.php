<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('registrations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->string('status')->default('pending'); // pending, approved, rejected
            $table->string('relationship_status')->nullable();
            $table->text('relationship_challenges')->nullable();
            $table->text('emotional_wellbeing')->nullable();
            $table->text('goals')->nullable();
            $table->string('preferred_session_type')->nullable();
            $table->string('program_interested')->nullable();
            $table->string('communication_preference')->nullable(); // whatsapp, email, phone
            $table->text('emergency_contact_info')->nullable();
            $table->text('admin_notes')->nullable();
            $table->foreignId('assigned_coach_id')->nullable()->constrained('users')->nullOnDelete();
            $table->timestamp('approved_at')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('registrations');
    }
};
