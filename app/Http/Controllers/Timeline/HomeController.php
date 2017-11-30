<?php namespace App\Http\Controllers\Timeline;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Commands\Timeline\CreatePost;
use App\Commands\Timeline\DeletePost;
use App\Commands\Timeline\ReplyToPost;
use App\Http\Requests\Timeline\EditPost as EditPostRequest;
use App\Http\Requests\Timeline\TimelineRequest;
use App\Http\Requests\Timeline\ReplyTimelineRequest;
use App\Models\Timeline as TimelineModel;
use App\Commands\Timeline\EditPost;
class HomeController extends Controller {

	public function index()
	{

	}

	public function edit($id, TimelineModel $timeline)
	{
		return $timeline->find($id);
	}

	public function create(TimelineRequest $request)
	{
		$timeline = $this->dispatch(new CreatePost($request));
		return $timeline;
	}

	public function reply($id, ReplyTimelineRequest $request, TimelineModel $timeline)
	{
		$timeline = $timeline->find($id);
		$reply = $this->dispatch(new ReplyToPost($timeline, $request));
		return $reply;
	}

	public function update(EditPostRequest $request)
	{
		$timeline = $this->dispatch(new EditPost($request));
		return $timeline;
	}

	public function delete($id)
	{
		$ret = $this->dispatch(new DeletePost($id));
		return $id;
	}

}
