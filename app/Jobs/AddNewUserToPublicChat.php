<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Models\User;
use App\Models\Chat;

class AddNewUserToPublicChat implements ShouldQueue
{
    use InteractsWithQueue, Queueable, SerializesModels;

    public $user;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $publicChat = Chat::where('chat_type', 2)->first();
        $user = $this->user;
        $publicChat->participants()->attach([
            $user->id => [
                'has_joined' => false
            ],
        ]);
    }
}
