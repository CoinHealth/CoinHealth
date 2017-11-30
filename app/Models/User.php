<?php namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use Illuminate\Notifications\Notifiable;
use Laravel\Cashier\Billable;
use Storage;
use App\Models\Patient;
use App\Models\Provider;
class User extends Model implements AuthenticatableContract, CanResetPasswordContract {
	use Authenticatable, CanResetPassword, Billable, Notifiable;

	protected $table = 'users';

	protected $fillable = [
		'username',
		'password',
		'first_name', //'fname',
		'middle_name',
		'last_name', // 'lname',
		'email',
		// 'avatar',
		'display_name',
		// 'location_id',
		'about',
		'is_public',
		'first',
		'role', // 'purpose',
		'sub_role',
		'insurance_card',
		'insurance_name',
		'digital_id',
		// added fields 5/12/2017 @cath
		'gender',
		'marital_status',
		'dob',
		'contact',
		'address',
	];

	protected $casts = [
		'first' => 'integer',
		'crm_fields' => 'object',
		'address' => 'object',
	];

	protected $hidden = [
		'password',
		'remember_token',
		'created_at',
		'updated_at',
		'verified',
		'location_id',
		'is_public',
		'first',
		'purpose',
		'prevent_modal',
	];

	protected $appends = [
		'full_name',
		'avatar_path',
		'user_role',
		'purpose',
		'fname',
		'lname',
		'full_address',
		'total_points',
		'signature_path',
	];

	// protected $with = [
	// 	'agent',
	// ];
	// 
	public function receivesBroadcastNotificationsOn()
    {
        return 'Activity.'.$this->id;
    }

	// added by @cath start
	public function directories()
	{
		return $this->hasMany(\App\Models\Directory::class);
	}

	public function providers()
	{
		return $this->belongsToMany(\App\Models\Provider::class, 'provider_user')
					->withPivot('job_title')
					->withTimestamps();
	}

	public function chats()
	{
		return $this->belongsToMany(\App\Models\Chat::class, 'chat_user')
					->orderBy('chat_user.created_at', 'DESC')
					->withPivot('has_joined')
					->withTimestamps();
	}

	/**
	 * Check if this user can join Chat
	 * @param  uuid $chatId id of the Chat
	 * @return boolean
	 */
	public function canJoinRoom($chatId)
	{
		$chat = $this->chats()->find($chatId);
		if ($chat->chat_type == 1) {
			return $chat->participants->contains($this->id) &&
					$chat->pivot->has_joined;
		}
		return true;
		// return $chat->participants->contains($this->id) && $chat->pivot->has_joined;
	}

	public function patientRequest()
	{
		return $this->hasMany('\App\Models\EhrLead');
	}
	// 2017-05-12
	public function agent()
	{
		return $this->hasOne('App\Models\Agent');
	}
	// end

	/**
	 * @author Eric
	 * 
	 * Get the patient Permissions
	 */

    public function permissions()
    {
        return $this->hasMany(\App\Models\PatientPermission::class, 'patient_id')
        			->with('permissibles');
    }

	// for renamed fields
	public function getPurposeAttribute()
	{
		return $this->role;
	}

	public function getFnameAttribute()
	{
		return $this->first_name;
	}

	public function getLnameAttribute()
	{
		return $this->last_name;
	}
	// end

	public function getIsSubscriberAttribute()
	{
		return $this->subscribed('crm') || $this->subscribed('ehr') || $this->subscribed('premium-listing');
	}

	//added by cath
	// used for getting patient user account
	public function patient()
	{
		return $this->hasOne(\App\Models\Patient::class);
	}

	public function patients()
	{
		return $this->belongsToMany(\App\Models\Patient::class, 'patient_provider', 'provider_id');
	}

	public function bookmarks()
	{
		return $this->hasMany(\App\Models\Bookmark::class);
	}

	public function subscribedForum()
	{
		return $this->belongsToMany(\App\Models\Forum::class)
								->withTimestamps();
	}

	public function level()
	{
		return $this->hasOne(\App\Models\Level::class);
	}

	public function news()
	{
		return $this->hasMany(\App\Models\News::class);
	}

	public function following()
	{
		return $this->belongsToMany(\App\Models\User::class, 'user_user', 'follower_id', 'following_id')
								->withTimestamps();
	}

	public function followers()
	{
		return $this->belongsToMany(\App\Models\User::class, 'user_user', 'following_id', 'follower_id')
								->withTimestamps();
	}

	public function timelines()
	{
		return $this->hasMany(\App\Models\Timeline::class)
								->orderBy('created_at', 'DESC');
	}

	public function posts()
	{
		return $this->hasMany(\App\Models\Post::class);
	}

	public function forums()
	{
		return $this->hasMany(\App\Models\Forum::class);
	}

	public function appreciates()
	{
		return $this->belongsToMany(\App\Models\User::class, 'badge_thank_you', 'receiver_id', 'sender_id')
								->withTimestamps();
	}

	public function badges()
	{
		return $this->belongsToMany(\App\Models\Badge::class)
						->withPivot('level', 'progress')
						->withTimestamps();
	}

	// old
	// public function points()
	// {
	// 	return $this->belongsToMany(\App\Models\Point::class)
	// 							->withPivot('action')
	// 							->withTimestamps();
	// }

	public function points()
	{
		return $this->hasMany(\App\Models\Point::class);
	}

	public function getTotalPointsAttribute()
	{
		return $this->points->sum('point');
	}

	public function activities()
	{
		return $this->hasMany(\App\Models\Activity::class)->orderBy('created_at', 'DESC');
	}

	public function location()
	{
		return $this->hasOne(\App\Models\Location::class, 'id', 'location_id');
	}

	public function attachments()
	{
		// return $this->hasMany(\App\Models\Attachment::class);
		return $this->morphMany(\App\Models\Attachment::class, 'attachable', 'data_model', 'data_id');
	}



	public function signature()
	{
		return $this->morphOne(\App\Models\Attachment::class, 'attachable', 'data_model', 'data_id')
					->where('file_type', 7);
	}

	public function getSignaturePathAttribute()
	{
		return $this->signature ? $this->signature->path : '';
	}

	public function threads()
	{
		return $this->belongsToMany(\App\Models\Thread::class)->orderBy('created_at', 'DESC');
	}

	// attributes
	public function getAvatarPathAttribute()
	{
		$avatars = $this->attachments()->avatars();
		if (!$avatars->count())
			return '/images/profile-default.png';

		return $avatars->latest()->first()->path;
	}

	public function getFullNameAttribute()
	{
		return $this->first_name . ' ' . $this->last_name;
	}

	public function getFullAddressAttribute()
	{
		// if ($this->location) {
		// 	return $this->location->city . ', ' . $this->location->pretty_name;
		// }
		$address = $this->address;
		$city = isset($address->city) ? $address->city . ', ' : '';
		$state = isset($address->state) ? $address->state . ', ' : '';
		$zip = isset($address->location_id) ? $address->location_id : '';
		$full_address = $city . $state . $zip;
		return $full_address;
	}

	// custom functions
	public function isAdmin()
	{
		return $this->purpose == 3;
	}

	public function isFollowing()
	{
		return auth()->check() && auth()->user()->following->contains($this->id);
	}

	// cath
	public function getUserRoleAttribute()
	{
		$purpose = $this->purpose;
		switch ($purpose) {
			case 1:
				$role = 'Patient';
				break;
			case 2:
				$role = 'Provider';
				break;
			case 3:
				$role = 'Agent';
				break;
			case 4:
				$role = 'Clinician';
				break;
			default:
				$role = 'User';
				break;
		}
		return $role;
	}

	// cath
	/* to get the staffs of the subscriber */
	public function staffs()
	{
		return $this->hasMany(\App\Models\Staff::class, 'subscriber_id', 'id');
	}

	public function isEhrCapable()
	{
		return $this->purpose == 2 || $this->purpose == 4;
	}

	public function isCrmCapable()
	{
		return $this->purpose == 3;
	}

	public function isPatient()
	{
		return $this->role == 1;
	}

	public function updateProviders()
    {
    	if ($this->isEhrCapable()) {
    		foreach ($this->providers as $provider) {
    			$provider->primaryKey = 'provider_id';
    			$provider->update([]);
    			$provider->primaryKey = 'id';
    		}
    	}
    }

	public function getCreditCardNumberAttribute()
	{
		$number = $this->attributes['card_last_four'];
		$cc = [
			'xxxx',
			'xxxx',
			'xxxx',
			$number,
		];
		return implode('-', $cc);
	}

	// @cath
    public function payments()
    {
    	return $this->hasMany(\App\Models\Payment::class, 'company_id');
    }

    public function payments2()
    {
    	return $this->hasMany(\App\Models\Payment::class, 'company_id')->orderBy('id', 'desc');
    }


    public function user_logs()
    {
    	return $this->hasMany(\App\Models\UserLog::class);
    }

}
