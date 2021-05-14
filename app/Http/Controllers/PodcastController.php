<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Podcast;

class PodcastController extends Controller
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

    public function queryCreator(Request $request, $id) 
    {
        $podcasts = Podcast::where('user_id', $id)
            ->with('category')
            ->get();

        return $podcasts;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $podcast = new Podcast();

        $podcast->title = request("title");
        $podcast->hosts = request("hosts");
        $podcast->short_description = request("shortDescription");
        $podcast->long_description = request("longDescription");
        $podcast->category_id = request("category");
        $podcast->user_id = request("user");

        $podcast->save();

        $file = $request->file('file');
        $extension = $file->getClientOriginalExtension();
        $image_name = "podcast_" . $podcast->id. "_image." . $extension;

        $file->storeAs('public/podcasts', $image_name);

        $podcast->image = $image_name;
        $podcast->save();

        return $podcast;
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
