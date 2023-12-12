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
        Schema::create('members', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->string('team_id')->default('');
            $table->string('name')->default('');
            $table->boolean('deleted')->default(false);
            $table->string('color')->default('');
            $table->string('real_name')->default('');
            $table->string('tz')->default('');
            $table->string('tz_label')->default('');
            $table->integer('tz_offset')->default(0);
            $table->boolean('is_admin')->default(false);
            $table->boolean('is_owner')->default(false);
            $table->boolean('is_primary_owner')->default(false);
            $table->boolean('is_restricted')->default(false);
            $table->boolean('is_ultra_restricted')->default(false);
            $table->boolean('is_bot')->default(false);
            $table->boolean('is_app_user')->default(false);
            $table->integer('updated')->default(0);
            $table->boolean('is_email_confirmed')->default(false);
            $table->string('who_can_share_contact_card')->default('');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('members');
    }
};
