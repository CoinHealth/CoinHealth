<?php namespace App\Http\Controllers\Directory;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Agent;
use App\Models\Directory;

class AgentController extends Controller {
    
    public function getIndex()
    {
        return view('directories.agent.index');
    }

    public function getAgents()
    {
        $agent_id = 0;
        if(auth()->user() ) {
            if(auth()->user()->role == 3)
            {
              $agent_id = auth()->user()->agent->id;   
            }
        }
        
        $data = [
            'agents' => Agent::all(),
            // 'user' => auth()->user() ? auth()->user()->id : null,
            'role' => auth()->user() ? auth()->user()->role : 0,
            'agent_id' => $agent_id,  
        ];
        return $data;

    }

    public function getAgent($id)
    {
        // $agent = User::find($id);
        $agent = Agent::find($id);
        $owned = auth()->user() ? (auth()->user()->id == $agent->user_id ? 1 : 0) : 0;
        $is_saved = auth()->user() ? ($agent->directories->where('user_id', auth()->user()->id)->count() ) : 0;
        return response()->json([
            'agent' => $agent,
            'owned' => $owned,
            'is_saved' => $is_saved, 
        ]);
    }

    public function postAgent(Request $request)
    {
        $data = $request->except('_token');
        $user = auth()->user();
        $success = true;

        $dirData = [
            'saveable_id' => $data['agent_id'],
            'saveable_type' => 'App\Models\Agent',
            'user_id' => $user->id,
        ];
        $save = Directory::create($dirData);
        if ($save) {
            $message = 'Successfully saved on your directory!';
        }
        else {
            $message = 'Some error occur!';
            $success = false;
        }

        if ($request->ajax())
            return response()->json([
                'success' => $success,
                'message' => $message,
            ]);

        return redirect()->back()->with('message', $message);

    }



}
