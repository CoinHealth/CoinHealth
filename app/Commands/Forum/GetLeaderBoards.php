<?php namespace App\Commands\Forum;

use App\Commands\Command;

use App\Models\Post;
use App\Models\Forum;
use DB;
class GetLeaderBoards extends Command  {

	public function __construct()
	{

	}

	public function handle()
	{
		$posts = Post::select(DB::raw('*, count(id) as count'))
									->orderBy('count', 'DESC')
									->groupBy('user_id')
									->whereHas('user', function ($qry){
										$qry->where('role', '!=', 0);
									})
									->get();

		$new = $posts->map(function($item) {
			return [
				'count' => $item->count + $item->user->forums->count(),
				'user' => $item->user,
			];
		});
		return $new;
	}

}
