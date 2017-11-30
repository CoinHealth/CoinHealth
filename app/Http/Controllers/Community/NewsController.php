<?php namespace App\Http\Controllers\Community;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\News;
use Hashids\Hashids;

use App\Commands\News\Vote;
use App\Http\Requests\News\VoteRequest;
class NewsController extends Controller {

	public function getIndex()
	{
		$data = [
			'news' => News::orderBy('created_at', 'DESC')->get()
		];
		
		return view('main.news.news')->with($data);
	}

	public function getBlowup($id)
	{
		$hash = new Hashids(env('HASH_SALT', 'c@r3p@rR0t'), 10);
		$id = $hash->decode($id)[0];
		$data = [
			'news' => News::orderBy('created_at', 'DESC')->get(),
			'blowup' => true,
			'current' => News::find($id),
		];

		return view('main.news.news')->with($data);
	}

	public function postVotes($id, Request $request, News $news)
	{
		$data = $request->except('_token');
		if (!auth()->check()) {
			return [
				'success' => false,
				'message' => 'Login First to Vote',
			];
		}
		$data['news_id'] = $id;
		$vote = $this->dispatch(new Vote($data));
		return $vote;
	}

}
