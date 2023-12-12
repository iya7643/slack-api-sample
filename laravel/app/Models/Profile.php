<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'cascade',
        'title',
        'phone',
        'skype',
        'real_name',
        'real_name_normalized',
        'display_name',
        'display_name_normalized',
        'fields',
        'status_text',
        'status_emoji',
        'status_emoji_display_info',
        'status_expiration',
        'avatar_hash',
        'always_active',
        'first_name',
        'last_name',
        'image_24',
        'image_32',
        'image_48',
        'image_72',
        'image_192',
        'image_512',
        'status_text_canonical',
        'team',
    ];

    protected $casts = [
        'fields' => 'array',
        'status_emoji_display_info' => 'array',
    ];

    protected $attributes = [
        'fields' => '[]',
        'status_emoji_display_info' => '[]',
    ];
}
