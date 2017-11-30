<?php namespace App\Http\Controllers\Community;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Commands\Blog\Vote;

use Illuminate\Http\Request;
use Hashids\Hashids;

class BlogsController extends Controller {

	public function getIndex()
	{
		$data = [
			'blogs' => Blog::orderBy('created_at', 'DESC')->get()
		];
		return view('main.blogs.index')->with($data);
	}

	public function postIndex(Request $request)
	{
		if (!auth()->check())
			return redirect()->back();

		$data = $request->except('_token');
		$data['user_id'] = auth()->user()->id;
		$blog = Blog::create($data);
		return redirect()->back();
	}

	public function getEdit($id, Blog $blog)
	{
		return $blog->find($id);
	}

	public function update($id, Request $request, Blog $blog)
	{
		$blog = $blog->find($id);
		$data =  $request->except(['_token','_method']);
		$blog->update($data);
		return redirect()->back();
	}

	public function delete($id, Blog $blog)
	{
		$blog = $blog->find($id);
		$blog->delete();
		return redirect()->back();
	}

	public function getBlowup($id)
	{
		$hash = new Hashids(env('HASH_SALT', 'c@r3p@rR0t'), 10);
		$id = $hash->decode($id)[0];
		$data = [
			'blogs' => Blog::orderBy('created_at', 'DESC')->get(),
			'blowup' => true,
			'current' => Blog::find($id),
		];
		return view('main.blogs.index')->with($data);
	}

	public function postVotes($id, Request $request)
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
