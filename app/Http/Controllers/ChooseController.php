<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Models\Story;
use App\Models\Choose;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChooseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $room= Room::find(1);
        return ($room->story()->where('title', 'like', '%bomb%')->with('choose')->get());
//            ::with(['story'=>function ($query){
//            $query->where('title', 'like', '%bomb%');
//        }], ['choose'])->get());

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
        $choose= New Choose();
        $choose->title=$request->choose;
        $choose->user_id=Auth::id();
        $choose->story_id=$request->story_id;
        $choose->save();
        return redirect()->back();

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Choose  $choose
     * @return \Illuminate\Http\Response
     */
    public function show(Choose $choose)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Choose  $choose
     * @return \Illuminate\Http\Response
     */
    public function edit(Choose $choose)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Choose  $choose
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Choose $choose)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Choose  $choose
     * @return \Illuminate\Http\Response
     */
    public function destroy(Choose $choose)
    {
        //
    }
}
