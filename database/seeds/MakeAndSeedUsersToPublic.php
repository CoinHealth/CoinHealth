<?php

use Illuminate\Database\Seeder;
use App\Models\Chat;
use App\Models\User;
use Ramsey\Uuid\Uuid;

class MakeAndSeedUsersToPublic extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $chat = Chat::whereChatType('chat_type', 2)->first();

        if (!$chat) {
            $chat = Chat::create([
                'chat_type' => 2,
                'id' => Uuid::uuid4()->toString(),
            ]);
        }
        $userIds = User::all()->keyBy('id')->pluck('id')->all();
        // $wew = $chat->participants()->whereIn('chat_user.user_id', [43,34]);
        foreach($userIds as $userId) {
            $chat->participants()->toggle([
                $userId => [
                    'has_joined' => false
                ],
            ]);
        }
    }
}
