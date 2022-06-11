<?php

namespace App\Http\Controllers;

use Hashids;
use App\Models\Room;
use App\Models\User;
use Inertia\Inertia;
use mysql_xdevapi\Table;
use App\Traits\AddsToast;
use Illuminate\Http\Request;
use Usernotnull\Toast\Toast;
use Illuminate\Support\Facades\Auth;

class RoomController extends Controller
{
    use AddsToast;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rooms=Room::all();

        return Inertia::render('Custom/Room', [
            'rooms' => $rooms,
        ]);
//        return response($rooms);
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

        $room = new Room();
//        $this->addToast('Updated', 'Delicious champagne has been updated', 'success', false);
        $room->title=$request->title;
        $room->cards=json_encode($request->cards);
        $room->user_id=Auth::id();
        $room->save();
        return redirect()->back()->with(
          'message' , 'success')->with('messageTitle', 'crated room '. $request->title);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function show(Room $room)
    {
//        $id = Hashids::connection($room)->decode($routeKey)[0] ?? null;
//        $modelInstance = resolve($room);
//
//        return  $modelInstance->findOrFail($id);
//        $room=($room->with('story')->get());
//        $room=($room[0]);
//        dd($room->story()->getResults()[0]->title);
        $room->cards=json_decode( $room->cards);
        return Inertia::render('Custom/RoomSingle', [
            'room' => $room,
            'story' => $room->story
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function edit(Room $room)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Room $room)
    {
        $room->title=$request->title;
        $room->cards=$request->cards;
        $room->save();
        return redirect()->back()->with(
            'message' , 'success')->with('messageTitle', 'updated room '. $request->title);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function destroy(Room $room)
    {
        $room->delete();
    }
}
