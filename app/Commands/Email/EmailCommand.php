<?php namespace App\Commands\Email;

use App\Commands\Command;

use SendGrid;
class EmailCommand extends Command  {

	private $from;
	private $to;
	private $message;
	private $name;
	private $subject;

	public function __construct($from,$to, $message, $name,$subject)
	{
		$this->from = $from;
		$this->to = $to;
		$this->message = $message;
		$this->name = $name;
		$this->subject = $subject;
	}

	public function handle()
	{
		// $username = config('services.sendgrid.username');
		// $password = config('services.sendgrid.password');
		// $ssl = config('services.sendgrid.ssl');
		// $sendgrid = new SendGrid($username, $password, [
		// 	'turn_off_ssl_verification'=>$ssl,
		// ]);
		// $email = new SendGrid\Email();
		// $email->setFrom($this->from)
		// 			->setSubject($this->subject)
		// 			->setFromName($this->name)
		// 			->addTo($this->to)
		// 			->setHtml($this->message);

		// $send = $sendgrid->send($email);

		$from = new SendGrid\Email("CareParrot", $this->from);
		$subject = $this->subject;
		$to = new SendGrid\Email($this->name, $this->to);
		$content = new SendGrid\Content("text/plain", $this->message);
		$mail = new SendGrid\Mail($from, $subject, $to, $content);
		$apiKey = config('services.sendgrid.api_key');
		$sg = new \SendGrid($apiKey);
		$response = $sg->client->mail()->send()->post($mail);
		return $response->body();
	}

}
