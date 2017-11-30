<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ChatReply extends Model
{

    protected $fillable = [
        'chat_id',
        'user_id',
        'message',
        'has_attachments',
        'has_permission',
        'permission',
        'read_at',
    ];

    protected $with = [
        'user',
        'attachments',
    ];

    protected $casts = [
        'permission' => 'object',
    ];

    protected $appends = [
        'timeago',
    ];

    public function chat()
    {
        return $this->belongsTo(\App\Models\Chat::class);
    }

    public function user()
    {
        return $this->belongsTo(\App\Models\User::class)
                    ->select([
                        'id',
                        'first_name',
                        'last_name',
                    ]);
    }

    public function getTimeagoAttribute()
    {
        return $this->created_at->diffForHumans();
    }

    public function attachments()
    {
        return $this->morphMany(\App\Models\Attachment::class, 'attachable', 'data_model', 'data_id');
    }
}
