<?php namespace App\Commands\Activity;

use App\Commands\Command;
use App\Models\Activity;

class CreateActivity extends Command  {

	protected $data;

	public function __construct(array $data)
	{
		$this->data = $data;
	}

	public function handle()
	{
		$data = $this->data;
		$data['user_id'] = auth()->user()->id;
		$activity = Activity::create($data);
		return $activity;
	}

}
