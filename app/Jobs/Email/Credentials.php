<?php

namespace App\Jobs\Email;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Http\Request;

use SendGrid;
class Credentials implements ShouldQueue
{
    protected $credentials; 
     public function __construct(array $credentials)
    {
        $this->credentials = $credentials;
    }
   
    public function handle()
    {
        $data = $this->credentials;
        // dd($data);
        $username = config('services.sendgrid.username');
        $password = config('services.sendgrid.password');
        $ssl = config('services.sendgrid.ssl');
        $sendgrid = new SendGrid($username, $password, [
            'turn_off_ssl_verification'=>$ssl,
        ]);
        $message= "Hi " . $data['name'] . ", <br><br><br> Thanks for joining Careparrot! Below is your log-in credentials: <br><br> <tab> Username: <tab>" . $data['username'] . "<br><br> <tab> Password: <tab>" . $data['password'] . "<br><br><br>If you didn't authorized anyone to create an account for you, please let us know by sending us a message through <a href='http://support@careparrot.com'>support@careparrot.com</a>.<br><br>Keep on sharing Careparrot's love. There's plenty to go around.<br>Thank you!<br><br><small>Careparrot Support<br>Please do not reply to this message. This message is a service email related to your use of Careparrot. For general inquiries or to request support with your Careparrot account, please visit us at <a href='http://www.careparrot.com'>www.careparrot.com</a></small>";
        // $email = new SendGrid\Email();
        // $email->setFrom('noreply@careparrot.com')
        //             ->setSubject('Customer Registration in Careparrot')
        //             ->setFromName('CareParrot')
        //             ->addTo($data['email'])
        //             ->setHtml($message);

        // $send = $sendgrid->send($email);

        $from = new SendGrid\Email("CareParrot", 'noreply@careparrot.com');
        $subject = 'Customer Registration in Careparrot';
        $to = new SendGrid\Email($data['name'], $data['email']);
        $content = new SendGrid\Content("text/html", $message);
        $mail = new SendGrid\Mail($from, $subject, $to, $content);
        $apiKey = config('services.sendgrid.api_key');
        $sg = new \SendGrid($apiKey);
        $response = $sg->client->mail()->send()->post($mail);
        // dd($response);

        return $response->body();
    }
}
