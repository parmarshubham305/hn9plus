<?php

namespace App\Http\Controllers\ProjectManager;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Developer;
use App\Models\Skill;
use App\Jobs\Backend\DeveloperJob;
use App\Http\Requests\Backend\DeveloperRequest;
use App\Models\DeveloperSkill;

class DeveloperController extends Controller
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
                $where_str .= " and ( name like \"%{$search}%\""
                    . ")";
            }
            
            $data = Developer::select('id', 'name', 'designation', 'email', 'contact_number')
                ->whereRaw($where_str, $where_params);
                
            $data_count = Developer::select('id')
                ->whereRaw($where_str, $where_params)
                ->count();

            $columns = ['id', 'name', 'designation', 'email', 'contact_number'];

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

        return view('admin.developer.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $skills = Skill::pluck('title', 'id')->toArray();

        return view('admin.developer.create', compact('skills'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DeveloperRequest $request)
    {
        $params = $request->all();
        
        dispatch(new DeveloperJob($params));
 
        return redirect()->back()->with('message', 'Record Saved Successfully.')
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
        $data = Developer::find($id);
        
        $data['skills'] = DeveloperSkill::where('developer_id', $id)->pluck('skill_id')->toArray();
        
        $skills = Skill::pluck('title', 'id')->toArray();

        return view('admin.developer.edit', compact('data', 'skills'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(DeveloperRequest $request, $id)
    {
        $params = $request->all();
        
        dispatch(new DeveloperJob($params));
 
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
        
        Developer::whereIn('id',$id)->delete();

        return redirect()->back()->with('message', 'Record Deleted Successfully.')
            ->with('type', 'success');
    }
}
