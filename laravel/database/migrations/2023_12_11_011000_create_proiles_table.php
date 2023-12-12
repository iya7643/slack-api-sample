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
        Schema::create('profiles', function (Blueprint $table) {
            $table->id();
            $table->string('member_id');
            $table->string('title')->default('');
            $table->string('phone')->default('');
            $table->string('skype')->default('');
            $table->string('real_name')->default('');
            $table->string('real_name_normalized')->default('');
            $table->string('display_name')->default('');
            $table->string('display_name_normalized')->default('');
            $table->json('fields');
            $table->string('status_text')->default('');
            $table->string('status_emoji')->default('');
            $table->json('status_emoji_display_info');
            $table->integer('status_expiration')->default(0);
            $table->string('avatar_hash')->default('');
            $table->boolean('always_active')->default(false);
            $table->string('first_name')->default('');
            $table->string('last_name')->default('');
            $table->string('image_24')->default('');
            $table->string('image_32')->default('');
            $table->string('image_48')->default('');
            $table->string('image_72')->default('');
            $table->string('image_192')->default('');
            $table->string('image_512')->default('');
            $table->string('status_text_canonical')->default('');
            $table->string('team')->default('');
            $table->timestamps();

            $table->foreign('member_id')->references('id')->on('members')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('profiles');
    }
};
