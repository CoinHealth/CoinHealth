<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Chat extends Model
{
    protected $table = 'chats';
    public $incrementing = false;

    protected $fillable = [
        'id',
        'user_id',
        'chat_type',
    ];

    public function participants()
    {
        return $this->belongsToMany(\App\Models\User::class, 'chat_user')
                    ->withPivot('has_joined')
                    ->select([
                        'users.id',
                        'users.first_name',
                        'users.last_name',
                        'users.role',
                    ])
                    ->withTimestamps();
    }

    public function user()
    {
        return $this->belongsTo(\App\Models\User::class);
    }

    public function replies()
    {
        return $this->hasMany(\App\Models\ChatReply::class)
                ->with(['attachments', 'user'])
                ->oldest();
    }

    public function patient()
    {
        return $this->participants()
                    ->where('users.role', 1)
                    ->with(['patient']);
    }

    public function attachments()
    {
        return $this->hasManyThrough(
                    \App\Models\Attachment::class, \App\Models\ChatReply::class,
                    'chat_id', 'data_id'
                )
                ->where('data_model', 'App\\Models\\ChatReply');
    }

    public function hasJoined()
    {
        $userId = auth()->check() ? auth()->user()->id : 0;
        return $this->participants->contains($userId);
    }
}
