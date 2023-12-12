<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    use HasFactory;

    protected $fillable = [
        'id', 'team_id', 'name', 'deleted', 'color', 'real_name', 'tz', 'tz_label', 'tz_offset',
        'is_admin', 'is_owner', 'is_primary_owner', 'is_restricted', 'is_ultra_restricted',
        'is_bot', 'is_app_user', 'updated', 'is_email_confirmed', 'who_can_share_contact_card',
    ];

    protected $casts = [
    ];
}
