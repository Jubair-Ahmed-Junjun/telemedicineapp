<?php

namespace App\Http\Controllers;

use App\VideoCall;
use Illuminate\Http\Request;

class VideoCallController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.pages.video-call');
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
     * @param  \App\VideoCall  $videoCall
     * @return \Illuminate\Http\Response
     */
    public function show(VideoCall $videoCall)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\VideoCall  $videoCall
     * @return \Illuminate\Http\Response
     */
    public function edit(VideoCall $videoCall)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\VideoCall  $videoCall
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, VideoCall $videoCall)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\VideoCall  $videoCall
     * @return \Illuminate\Http\Response
     */
    public function destroy(VideoCall $videoCall)
    {
        //
    }
}
