<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Jobs\Backend\ProjectJob;
use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\ProjectManager;
use App\Models\Skill;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            
            $where_str = '1 = ?';
            $where_params = [1];

            if ($request->has('sSearch')) {
                $search = $request->get('sSearch');
                $where_str .= " and ( title like \"%{$search}%\""
                    . ")";
            }
            
            $data = Project::select('projects.id', 'users.first_name as user', 'project_managers.name as manager', 'is_project', 'quote_type', 'title', 'timeline', 'payment_type')
                ->leftjoin('users','users.id', '=', 'projects.user_id')
                ->leftjoin('project_managers','project_managers.id', '=', 'projects.project_manager_id')
                ->whereRaw($where_str, $where_params);
                
            $data_count = Project::select('projects.id')
                ->leftjoin('users','users.id', '=', 'projects.user_id')
                ->leftjoin('project_managers','project_managers.id', '=', 'projects.project_manager_id')
                ->whereRaw($where_str, $where_params)
                ->count();

            $columns = ['id', 'user', 'manager', 'is_project', 'quote_type', 'title', 'timeline', 'payment_type'];

            if ($request->has('iDisplayStart') && $request->get('iDisplayLength') != '-1') {
                $data = $data->take($request->get('iDisplayLength'))->skip($request->get('iDisplayStart'));
            }
            if ($request->has('iSortCol_0')) {
                for ($i = 0; $i < $request->get('iSortingCols'); $i++) {
                    $column = $columns[$request->get('iSortCol_' . $i)];
                    if (false !== ($index = strpos($column, ' as '))) {
                        $column = substr($column, 0, $index);
                    }
                    $data = $data->orderBy($column, $request->get('sSortDir_' . $i));
                }
            }

            $data = $data->get();
            
            $response['iTotalDisplayRecords'] = $data_count;
            $response['iTotalRecords'] = $data_count;

            $response['sEcho'] = intval($request->get('sEcho'));

            $response['aaData'] = $data;

            return $response;
        }

        return view('admin.project.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Project::with('user')->find($id);

        $projectManagers = ProjectManager::pluck('name', 'id')->toArray();
        
        $skills = Skill::whereIn('id', json_decode($data['skills'], true))->pluck('title', 'id')->toArray();

        return view('admin.project.show', compact('data', 'skills', 'projectManagers'));
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
        $params = $request->all();
        
        dispatch(new ProjectJob($params));
 
        return redirect()->back()->with('message', 'Record Saved Successfully.')
            ->with('type', 'success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $request)
    {
        $id = $request->get('id');
        
        if(!is_array($id)){
            $id = array($id);
        }
        
        Project::whereIn('id',$id)->delete();

        return redirect()->back()->with('message', 'Record Deleted Successfully.')
            ->with('type', 'success');
    }
}
