<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Subscriber extends Model {

	protected $table = 'subscribers';

	protected $fillable = [
		'name',
		'email',
		'subscription',
		'payment_info',
		'stripe_id',
		'card_brand',
		'card_last_four',
		'trial_ends_at',
	];

	protected $casts = [
		'payment_info' => 'array',
	];

	public function scopeActiveSubscribers($qry)
    {
        return $qry->whereNull('stripe_id');
    }
}
