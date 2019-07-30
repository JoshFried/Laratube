<?php

namespace Laratube\Http\Controllers;

use Laratube\Channel;
use Illuminate\Http\Request;
use Laratube\Http\Requests\Channels\UpdateChannelRequest;

class ChannelController extends Controller
{

    /* validates if current user is the owner of channel
        redirects users to login page if their not logged in 
        sends 403 error to users if theyre logged in, but arent the channel owner
    */ 
    public function __construct()
    {
        $this->middleware(['auth'])->only('update');
    }


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
        $videos = $channel->videos()->paginate(5);
        return view('channels.show', compact('channel', 'videos'));
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
    public function update(UpdateChannelRequest $request, Channel $channel)
    {
        if ($request->hasFile('image')) {

            // first clear previous avatar
            $channel->clearMediaCollection('images');

            //upload new avatar to db
            $channel->addMediaFromRequest('image')
            ->toMediaCollection('images'); 
        }

        $channel->update([
            'name' => $request->name, 
            'description' => $request->description
        ]);
        
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
