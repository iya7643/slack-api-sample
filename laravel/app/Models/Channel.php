<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Channel extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'name',
        'is_channel',
        'is_group',
        'is_im',
        'is_mpim',
        'is_private',
        'created',
        'is_archived',
        'is_general',
        'unlinked',
        'name_normalized',
        'is_shared',
        'is_org_shared',
        'is_pending_ext_shared',
        'pending_shared',
        'context_team_id',
        'updated',
        'parent_conversation',
        'creator',
        'is_ext_shared',
        'shared_team_ids',
        'pending_connected_team_ids',
        'is_member',
        'topic',
        'purpose',
        'previous_names',
        'num_members',
    ];

    protected $casts = [
        'pending_shared' => 'array',
        'shared_team_ids' => 'array',
        'pending_connected_team_ids' => 'array',
        'topic' => 'array',
        'purpose' => 'array',
        'previous_names' => 'array',
    ];

    protected $attributes = [
        'pending_shared' => '[]',
        'shared_team_ids' => '[]',
        'pending_connected_team_ids' => '[]',
        'topic' => '[]',
        'purpose' => '[]',
        'previous_names' => '[]',
    ];

    public function setParentConversationAttribute($value): void
    {
        $this->attributes['parent_conversation'] = $value ?? '';
    }

    public function getParentConversationAttribute($value): string
    {
        return $value ?? '';
    }
}
