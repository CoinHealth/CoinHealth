<?php namespace App\Commands\Plan;

use App\Commands\Command;

use DB;
class PostRating extends Command  {

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
		$plan = DB::table('plan_user');

		if (auth()->check()) {
			$plan->where('plan_id_standard_component', $request->input('plan_id_standard_component'));
			if (!$plan->count()) {
				$plan->insertGetId([
					'user_id' => auth()->user()->id,
					'votes' => $request->input('value'),
					'plan_id_standard_component' => $request->input('plan_id_standard_component')
				]);
			}
			else {
				$plan = $plan->where('user_id', auth()->user()->id);
				if ($plan->count()) {
					$plan->update(['votes' => $request->input('value')]);
				}
				else {
					$plan->insertGetId([
						'user_id' => auth()->user()->id,
						'votes' => $request->input('value'),
						'plan_id_standard_component' => $request->input('plan_id_standard_component')
					]);
				}
			}
			return [
				'whole_avg' => round($plan->avg('votes')),
				'total_voters' => $plan->count(),
				'total_rates' => $plan->sum('votes'),
				'dec_avg' => $plan->avg('votes') ? $plan->avg('votes') : 0,
				'authed' => auth()->check(),
			];
		}

	}

}
