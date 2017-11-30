<?php namespace App\Commands\Forum;

use App\Commands\Command;


use App\Models\Post;

class CreatePost extends Command {

	private $request;
	private $forum;
	/**
	 * Create a new command instance.
	 *
	 * @return void
	 */
	public function __construct($request, $forum)
	{
		$this->request = $request;
		$this->forum = $forum;
	}

	/**
	 * Execute the command.
	 *
	 * @return void
	 */
	public function handle(Post $post)
	{
		$forum = $this->forum;
		$data = $this->request->except('_token');
		$data['user_id'] = auth()->user()->id;
		$data['forum_id'] = $forum->id;
		$post = Post::create($data);
		return $post;
	}

}
