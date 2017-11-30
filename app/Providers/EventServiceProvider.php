<?php

namespace App\Providers;

use Illuminate\Support\Facades\Event;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
     protected $listen = [
 		'App\Events\UserWasLoggedIn' => [
 			// 'App\Handlers\Events\AwardADailyRoutineBadge',
 			// 'App\Handlers\Events\AwardAnEarlyBirdBadge',
            // 'App\Handlers\Events\AwardANightCrusaderBadge',
 			'App\Listeners\LoggedInPoints',
 		],

 		'App\Events\ProfileWasUpdated' => [
 			// 'App\Handlers\Events\AwardUpdatingProfileBadge',
            'App\Listeners\RewardUpdatingProfilePoints',

 		],

        'App\Events\UserSetAppointment' => [
            'App\Listeners\RewardAppointmentPoints',
        ],

        'App\Events\UserContactedUs' => [
            'App\Listeners\RewardContactPoints',
        ],

 		'App\Events\FileWasUploaded' => [
 			'App\Handlers\Events\AwardUploadedFileBadge',
 		],

 		'App\Events\CreatedNewThread' => [
 			'App\Handlers\Events\AwardSmoothTalkerBadge',
 		],

 		'App\Events\CelebratingAnniversary' => [
 			'App\Handlers\Events\AwardHappyAnniversaryBadge',
 			'App\Handlers\Events\AwardHappySecondAnniversaryBadge',
 		],

 		'App\Events\UserGiveThanks' => [
 			'App\Handlers\Events\AwardThankYouBadge',
 		],

 		'App\Events\AskHealth' => [
 			'App\Handlers\Events\ShowHealthCounter',
 		],

 		'App\Events\UserIsAHealthAchiever' => [
 			'App\Handlers\Events\RewardHealthPoints',
 		],

 		'App\Events\UserFollows' => [
 			'App\Handlers\Events\AwardAnEyesOnYouBadge',
 		],

 		'App\Events\UserGiveRatings' => [
 			'App\Handlers\Events\AwardGiveRatingsBadge',
 		],
 		'App\Events\UserJoinNetworkProvider' => [
 			'App\Handlers\Events\AwardNetworkProviderBadge',
 		],
 		'App\Events\UserCreatedNewTopic' => [
 			'App\Handlers\Events\AwardTopicCreatorBadge',
 		],
 		'App\Events\UserReplyToTopics' => [
 			'App\Handlers\Events\AwardReplyBadge',
 		],
 		'App\Events\Activities\ThreadWasCreated' => [
 			'App\Handlers\Events\NotifyProfile',
 		],
 		'App\Events\Timeline\PostWasCreated' => [
 			'App\Handlers\Events\Timeline\AppendPost',
 		],
 		'App\Events\Timeline\ReplyWasCreated' => [
 			'App\Handlers\Events\Timeline\AppendReply',
 		],
 		'App\Events\Timeline\PostWasUpdated' => [
 			'App\Handlers\Events\Timeline\EditPost',
 		],
 		'App\Events\Timeline\PostWasDeleted' => [
 			'App\Handlers\Events\Timeline\DeletePost',
 		],
 		'App\Events\Permissions\PermissionWasRequested' => [
 			'App\Handlers\Events\Permissions\SendPermissionRequestToPatient',
 		],


 	];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        //
    }
}
