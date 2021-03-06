<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Podcast;

class PodcastController extends Controller
{
    public function queryCreator(Request $request, $id) 
    {
        $podcasts = Podcast::where('user_id', $id)
            ->with('category')
            ->get();

        return $podcasts;
    }

    public function queryCategory($id) 
    {
        $podcasts = Podcast::where('category_id', $id)
            ->with('category')
            ->get();

        return $podcasts;

    }

    public function recomendedPodcasts() {
        $podcastA = Podcast::find(7);
        $podcastB = Podcast::find(2);
        $podcastC = Podcast::find(3);
        $podcastD = Podcast::find(4);

        return array($podcastA, $podcastB, $podcastC, $podcastD);
    }

    public function queryPods(Request $request) 
    {
        $search = $request->input('search');

        $podcasts = Podcast::query()
            ->where('title', 'LIKE', "%{$search}%")
            ->get();

        return $podcasts;

    }

    public function getPodcast(Request $request, $id) 
    {
        $podcast = Podcast::find($id);
        $podcast['category'] = $podcast->category;

        return $podcast;
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
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id, $id_podcast)
    {
        $podcast = Podcast::find($id_podcast);

        $podcast->title = request("title");
        $podcast->hosts = request("hosts");
        $podcast->short_description = request("shortDescription");
        $podcast->long_description = request("longDescription");
        $podcast->category_id = request("category");

        if($request->hasFile('file')) {
            $file = $request->file('file');
            $extension = $file->getClientOriginalExtension();
            $image_name = "podcast_" . $podcast->id. "_image." . $extension;

            $file->storeAs('public/podcasts', $image_name);
            $podcast->image = $image_name;
        }

        $podcast->save();

        return $podcast;
    }
}
