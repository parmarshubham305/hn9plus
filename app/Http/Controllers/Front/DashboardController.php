<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ProjectQuote;
use App\Models\Chat;
use App\Models\Admin;
use Illuminate\Support\Str;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $quotes = ProjectQuote::where('user_id', \Auth::user()->id)->where('status', 'Pending')->with('hiredResources')->get()->toArray();
        
        return view('frontend.dashboard', compact('quotes'));
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

    public function chat(Request $request) 
    {
        $admin = Admin::first();

        $randomString = Str::random(7);

        $user = Chat::where(['admin_id' => $admin['id'], 'user_id' => auth()->user()->id])->firstOr(function () use ($admin, $randomString) {
            return Chat::create([
                'admin_id' => $admin['id'],
                'user_id' => auth()->user()->id,
                'channel' => $randomString
            ]);
        });
        $chatChannel = $user['channel'];

        return view('frontend.chat', compact('user', 'chatChannel'));
    }
}
