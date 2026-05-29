<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // user_id nullable is handled at the application level by auto-creating user accounts
    }

    public function down(): void
    {
        //
    }
};
