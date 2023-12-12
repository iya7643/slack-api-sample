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
        Schema::create('channels', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->string('name')->default('');
            $table->boolean('is_channel')->default(false);
            $table->boolean('is_group')->default(false);
            $table->boolean('is_im')->default(false);
            $table->boolean('is_mpim')->default(false);
            $table->boolean('is_private')->default(false);
            $table->bigInteger('created')->default(0);
            $table->boolean('is_archived')->default(false);
            $table->boolean('is_general')->default(false);
            $table->integer('unlinked')->default(0);
            $table->string('name_normalized')->default('');
            $table->boolean('is_shared')->default(false);
            $table->boolean('is_org_shared')->default(false);
            $table->boolean('is_pending_ext_shared')->default(false);
            $table->json('pending_shared');
            $table->string('context_team_id')->default('');
            $table->bigInteger('updated')->default(0);
            $table->string('parent_conversation')->default('');
            $table->string('creator')->default('');
            $table->boolean('is_ext_shared')->default(false);
            $table->json('shared_team_ids');
            $table->json('pending_connected_team_ids');
            $table->boolean('is_member')->default(false);
            $table->json('topic');
            $table->json('purpose');
            $table->json('previous_names');
            $table->integer('num_members')->default(0);

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('channels');
    }
};
