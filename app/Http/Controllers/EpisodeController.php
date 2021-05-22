<?php

namespace App\Http\Controllers;

Use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Podcast;
use App\Models\Episode;

class EpisodeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $podcast = Podcast::find($id)
            ->with('episodes')
            ->get();

        return $podcast[0];
    }

    public function get($id, $ep_id)
    {
        $episode = Episode::find($ep_id);
        $episode['podcast'] = $episode->podcast;

        return $episode;
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
        $podcastId = request("podcastId");

        $podcast = Podcast::find($podcastId)->get()[0];

        $episode = new Episode();

        $episode->podcast_id = $podcastId;
        $episode->title = request("title");
        $episode->description = request("description");
        $episode->publish_date = Carbon::now();

        $episode->save();


        if($request->hasFile('image')) {
            $image = $request->file('image');
            $extension = $image->getClientOriginalExtension();
            $image_name = "podcast_" . $podcast->id . "_episode_" . $episode->id . "_image." . $extension;

            $image->storeAs('public/podcasts', $image_name);

            $episode->image = $image_name;
        } else {
            $episode->image = $podcast->image;
        }

        $audio = $request->file('audio');

        $extension = $audio->getClientOriginalExtension();
        $audio_name = "podcast_" . $podcast->id . "_episode_" . $episode->id . "_audio." . $extension;

        $audio->storeAs('public/podcasts', $audio_name);

        $episode->audio = $audio_name;

        $episode->save();

        return $episode;
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
    public function update(Request $request, $id, $ep_id)
    {
        $episode = Episode::find($ep_id);
        $podcast = Podcast::find($id);

        $episode->title = request("title");
        $episode->description = request("description");

        if($request->hasFile('image')) {
            $image = $request->file('image');
            $extension = $image->getClientOriginalExtension();
            $image_name = "podcast_" . $podcast->id . "_episode_" . $episode->id . "_image." . $extension;

            $image->storeAs('public/podcasts', $image_name);

            $episode->image = $image_name;
        } 

        if($request->hasFile('audio')) {
            $audio = $request->file('audio');

            $extension = $audio->getClientOriginalExtension();
            $audio_name = "podcast_" . $podcast->id . "_episode_" . $episode->id . "_audio." . $extension;

            $audio->storeAs('public/podcasts', $audio_name);

            $episode->audio = $audio_name;
        }

        $episode->save();

        return $episode;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, $ep_id)
    {
        return Episode::destroy($ep_id);
    }
}
