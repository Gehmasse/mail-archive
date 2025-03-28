<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('mails', function (Blueprint $table) {
            $table->id();
            $table->string('message_id')->nullable();
            $table->text('subject')->nullable();
            $table->dateTime('date')->nullable();
            $table->json('from');
            $table->json('to');
            $table->mediumText('body_plain')->nullable();
            $table->mediumText('body_html')->nullable();
            $table->string('eml_path');
            $table->timestamps();

            $table->unique(['message_id']); // always unique?
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mails');
    }
};
