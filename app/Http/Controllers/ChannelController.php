<?php

namespace Laratube\Http\Controllers;

use Laratube\Channel;
use Illuminate\Http\Request;

class ChannelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  \Laratube\Channel  $channel
     * @return \Illuminate\Http\Response
     */
    public function show(Channel $channel)
    {
        return view('channels.show', compact('channel'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \Laratube\Channel  $channel
     * @return \Illuminate\Http\Response
     */
    public function edit(Channel $channel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Laratube\Channel  $channel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Channel $channel)
    {
        if ($request->hasFile('image')) {

            // first clear previous avatar
            $channel->clearMediaCollection('images');

            //upload new avatar to db
            $channel->addMediaFromRequest('image')
            ->toMediaCollection('images'); 
        }

        return redirect()->back(); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Laratube\Channel  $channel
     * @return \Illuminate\Http\Response
     */
    public function destroy(Channel $channel)
    {
        //
    }
}
