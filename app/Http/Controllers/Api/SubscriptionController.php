<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Plan;

class SubscriptionController extends Controller
{
    public function getPlans($subscription) 
    {
    	$plans = Plan::where('type', $subscription)->get();
    	return $plans; 
    }
}
