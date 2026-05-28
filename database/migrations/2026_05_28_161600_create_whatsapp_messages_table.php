<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('whatsapp_messages', function (Blueprint $table) {
            $table->id();
            $table->string('from');
            $table->string('to');
            $table->text('message')->nullable();
            $table->string('message_type')->default('text'); // text, image, template
            $table->string('direction'); // inbound, outbound
            $table->string('status')->default('sent'); // sent, delivered, read, failed
            $table->string('whatsapp_message_id')->nullable();
            $table->json('metadata')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('whatsapp_messages');
    }
};
