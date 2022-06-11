<?php

namespace App\Http\Controllers;

use App\Models\Room;
use Inertia\Inertia;
use App\Models\Story;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $stories=Story::all();

        return response($stories);
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
    public function store(Room $room, Request $request)
    {
        $story = new Story();
//        $story=$story->;
//        dd($story);
        $story->title=$request->title;
        $story->room_id=$room->id;
        $story->user_id=Auth::id();
        $story->save();
        return $this->index();

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Story  $story
     * @return \Illuminate\Http\Response
     */
    public function show(Room $room, Story $story)
    {
//        if ($room->id==$story->room_id)
        return Inertia::render('testd', "cfccfcf");
        dd ($room, $story);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Story  $story
     * @return \Illuminate\Http\Response
     */
    public function edit(Story $story)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Story  $story
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Story $story)
    {
        $story->title=$request->title;
        $story->room_id=$request->room_id;
        $story->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Story  $story
     * @return \Illuminate\Http\Response
     */
    public function destroy(Room $room, Story $story)
    {
        $story->delete();
    }
}
