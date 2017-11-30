<?php

namespace App\Jobs\Subscription;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

use Illuminate\Http\Request;



class Subscribe 
{
    protected $request;
    public function __construct(Request $request)
    {
        $this->request = $request;   
    }

    public function handle()
    {
        $data = $this->request->except('_token');
        $user = auth()->user();
        $stripe_key = config('services.stripe.key');
        \Stripe\Stripe::setApiKey($stripe_key);
        try {
            $stripe = \Stripe\Token::create(array(
                  "card" => array(
                    "number" => $data['credit_card_number'],
                    "exp_month" => $data['exp_month'],
                    "exp_year" => $data['exp_year'],
                    "cvc" => $data['cvv_cid']
                  )
                ));

            try {
                $subscription = $user->newSubscription($data['subscription'], $data['stripe_plan'])
                                    ->create($stripe->id);
                $user->updateProviders();
                $ret = [
                    'success' => true,
                    'data' => $subscription,
                ];
                return $ret;
            } catch (Exception $e) {
                return $e;
            }

        } catch(\Stripe\Error\Card $e) {
            $body = $e->getJsonBody();
            $err  = $body['error']['message'];
            return $err;
        } catch (\Stripe\Error\RateLimit $e) {
            return $e;
        } catch (\Stripe\Error\InvalidRequest $e) {
            return $e;
        } catch (\Stripe\Error\Authentication $e) {
            return $e;
        } catch (\Stripe\Error\ApiConnection $e) {
            return $e;
        } catch (\Stripe\Error\Base $e) {
            return $e;
        } catch (Exception $e) {
            return $e;
        }
       

        

    }
}
