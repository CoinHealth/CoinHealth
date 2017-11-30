<?php namespace App\Commands\Plan;

use App\Commands\Command;

use DB;
class GetRating extends Command  {

	private $request;
	/**
	 * Create a new command instance.
	 *
	 * @return void
	 */
	public function __construct($request)
	{
		$this->request = $request;
	}

	/**
	 * Execute the command.
	 *
	 * @return void
	 */
	public function handle()
	{
		$request = $this->request;
		$ratings = DB::table('plan_user')
										->where('plan_id_standard_component', $request->input('plan_id_standard_component'));
		return [
			'whole_avg' => round($ratings->avg('votes')),
			'total_voters' => $ratings->count(),
			'total_rates' => $ratings->sum('votes'),
			'dec_avg' => $ratings->avg('votes') ? $ratings->avg('votes') : 0,
			'authed' => auth()->check(),
		];
	}

}
