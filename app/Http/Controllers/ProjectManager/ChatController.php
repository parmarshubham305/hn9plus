<?php

namespace App\Http\Controllers\ProjectManager;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Chat;
use App\Models\Project;
use App\Models\Developer;
use App\Models\User;
use App\Models\ProjectHiredResource;
use Illuminate\Support\Str;
use App\Models\ChatUser;

class ChatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $chats = Chat::get()->toArray();

        $userId = auth()->guard('project_manager')->user()->id;

        return view('project_manager.chat.index', compact('chats', 'userId'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $developers = Developer::pluck('name', 'id');

        $projects = Project::pluck('title', 'id');

        return view('project_manager.chat.create', compact('developers', 'projects'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $params = $request->all();

        $hiredResource = ProjectHiredResource::where('project_id', $params['project_id'])->first();

        $developer = Developer::find($params['developer_id']);

        if($hiredResource) {
            $resources = json_decode($hiredResource['resources'], true);
            foreach ($resources as $key => $resource) {
                if($params['developer_id'] != $resource['id']) {
                    $resources[] = $developer;
                    ProjectHiredResource::create([
                        'project_id' => $params['project_id'],
                        'resources' => json_encode($resources)
                    ]);
                }
            }
        } else {
            ProjectHiredResource::create([
                'project_id' => $params['project_id'],
                'resources' => json_encode($developer)
            ]);
        }

        //--- Check Chat
        $randomString = Str::random(7);
        
        $chat = Chat::create([
            'project_id' => $params['project_id'],
            'chat_type' => 'Group',
            'channel' => $randomString,
            'title' => $params['title']
        ]);
            
        ChatUser::updateOrCreate([
            'chat_id' => $chat['id'],
            'user_id'  => $params['developer_id'],
            'user_type' => 'Developer'
        ],[
            'chat_id' => $chat['id'],
            'user_id'  => $params['developer_id'],
            'user_type' => 'Developer'
        ]);

        return redirect()->back()->with('message', 'Record Created Successfully.')
            ->with('type', 'success');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}