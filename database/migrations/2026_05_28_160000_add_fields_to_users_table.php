<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('phone')->nullable()->after('email');
            $table->text('bio')->nullable()->after('phone');
            $table->string('avatar')->nullable()->after('bio');
            $table->string('timezone', 100)->nullable()->after('avatar');
            $table->boolean('is_active')->default(true)->after('timezone');
            $table->string('gender')->nullable()->after('is_active');
            $table->date('date_of_birth')->nullable()->after('gender');
            $table->string('emergency_contact')->nullable()->after('date_of_birth');
        });
    }

    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn([
                'phone', 'bio', 'avatar', 'timezone', 'is_active',
                'gender', 'date_of_birth', 'emergency_contact',
            ]);
        });
    }
};
