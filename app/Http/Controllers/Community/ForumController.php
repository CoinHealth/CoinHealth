<?php namespace App\Http\Controllers\Community;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\Forum;
use App\Models\Post;
use App\Http\Requests\Forums\Create as CreateTopicRequest;
use App\Http\Requests\Forums\CreatePost as CreatePostRequest;

use App\Commands\Forum\CreateTopic;
use App\Commands\Forum\CreatePost;
use App\Commands\Forum\GetLeaderBoards;
use App\Commands\Forum\GetMoreReplies;
// events
use App\Events\UserCreatedNewTopic;
use App\Events\UserReplyToTopics;
class ForumController extends Controller {

	public function getIndex()
	{
		$data = [
			'general' => [
				'topic' => Forum::generalTopics()->count(),
				'comments' => Post::generalTopics()->comments()->count(),
			],
			'health' => [
				'topic' => Forum::healthTopics()->count(),
				'comments' => Post::healthTopics()->comments()->count(),
			],
			'news' => [
				'topic' => Forum::newsTopics()->count(),
				'comments' => Post::newsTopics()->comments()->count(),
			],
			'support' => [
				'topic' => Forum::supportTopics()->count(),
				'comments' => Post::supportTopics()->comments()->count(),
			],
		];
		return view('main.forums.index')->with($data);
	}

	public function postIndex(CreateTopicRequest $request)
	{
		if (!auth()->check()) {
			return redirect('/auth/login?continue=/community/forums')->withError([
				'You need to Login to create a topic'
			]);
		}
		$topic = $this->dispatch(new CreateTopic($request));
		$route = '/community/forums/'.$topic->channel_route.'/'.$topic->id.'/'.str_slug($topic->title);
		return redirect($route);
	}

	public function getGeneral()
	{
		$data = [
			'topics' => Forum::generalTopics()->orderBy('created_at', 'DESC')->paginate(10),
			'leaderboards' => $this->dispatch(new GetLeaderBoards()),
		];
		// dd($data);
		return view('main.forums.general')->with($data);
	}

	public function getHeath()
	{
		$data = [
			'topics' => Forum::healthTopics()->orderBy('created_at', 'DESC')->paginate(10),
			'leaderboards' => $this->dispatch(new GetLeaderBoards()),
		];
		return view('main.forums.health')->with($data);;
	}

	public function getNews()
	{
		$data = [
			'topics' => Forum::newsTopics()->orderBy('created_at', 'DESC')->paginate(10),
			'leaderboards' => $this->dispatch(new GetLeaderBoards()),
		];
		return view('main.forums.news')->with($data);;
	}

	public function getSupport()
	{
		$data = [
			'topics' => Forum::supportTopics()->orderBy('created_at', 'DESC')->paginate(10),
			'leaderboards' => $this->dispatch(new GetLeaderBoards()),
		];
		return view('main.forums.support')->with($data);;
	}

	public function getTopic($id, $slug, Forum $forum, Request $request)
	{
		$topic = $forum->find($id);
		$data = [
			'topic' => $topic,
			'comments' => $topic->posts()->comments()->paginate(10),
			'action' => 'view_topic',
			'uri' => $request->getPathInfo(),
		];

		if ($request->has('page') && $request->input('load-reply')) {
			$topic = $topic->posts()->with(['user','replies.user'])->comments()->paginate(10);
			return $topic->toJson();
		}
		$route = '/community/forums/'.$topic->channel_route;
		return redirect($route)->with($data);
	}

	public function postComment($id, CreatePostRequest $request, Forum $forum)
	{
		if (!auth()->check()) {
				return redirect('/auth/login?continue=/community/forums')->withError([
				'You need to Login to post comment'
			]);
		}
		$post = $this->dispatch(new CreatePost($request, $forum->find($id)));
		//dd($post);
		if ($post)
			$event= event(new UserReplyToTopics(auth()->user()));
			//dd(session()->all());
		return redirect($request->input('uri'))->with([
			'uri' => $request->input('uri'),
			// 'Badge' => session()->get('Badge'),
			// 'LeveledUp' => session()->get('LeveledUp'),
			// 'BadgeIcon' => session()->get('BadgeIcon'),
		]);
	}

}
