<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('registrations', function (Blueprint $table) {
            $table->string('full_name')->nullable()->after('user_id');
            $table->integer('age')->nullable()->after('full_name');
            $table->string('gender')->nullable()->after('age');
            $table->string('country')->nullable()->after('gender');
            $table->string('city')->nullable()->after('country');
            $table->string('nationality')->nullable()->after('city');
            $table->string('phone')->nullable()->after('nationality');
            $table->string('email')->nullable()->after('phone');
            $table->string('occupation')->nullable()->after('email');
            $table->string('relationship_length')->nullable()->after('relationship_status');
            $table->string('challenge_type')->nullable()->after('relationship_challenges');
            $table->text('challenge_explanation')->nullable()->after('challenge_type');
            $table->text('emotional_effects')->nullable()->after('emotional_wellbeing');
            $table->boolean('has_spoken_to_someone')->nullable()->after('emotional_effects');
            $table->text('support_hoping_for')->nullable()->after('has_spoken_to_someone');
            $table->json('interested_sessions')->nullable()->after('support_hoping_for');
            $table->string('selected_program')->nullable()->after('program_interested');
            $table->string('preferred_session_format')->nullable()->after('selected_program');
            $table->boolean('willing_to_participate')->nullable()->after('preferred_communication');
            $table->text('personal_goals')->nullable()->after('willing_to_participate');
            $table->boolean('terms_accepted')->default(false)->after('personal_goals');
            $table->json('form_data')->nullable()->after('terms_accepted');
            $table->string('payment_method')->nullable()->after('form_data');
            $table->string('payment_phone')->nullable()->after('payment_method');
            $table->string('payment_reference')->nullable()->after('payment_phone');
        });
    }

    public function down(): void
    {
        Schema::table('registrations', function (Blueprint $table) {
            $table->dropColumn([
                'full_name', 'age', 'gender', 'country', 'city', 'nationality',
                'phone', 'email', 'occupation', 'relationship_length', 'challenge_type',
                'challenge_explanation', 'emotional_effects', 'has_spoken_to_someone',
                'support_hoping_for', 'interested_sessions', 'selected_program',
                'preferred_session_format', 'willing_to_participate', 'personal_goals',
                'terms_accepted', 'form_data', 'payment_method', 'payment_phone', 'payment_reference',
            ]);
        });
    }
};
