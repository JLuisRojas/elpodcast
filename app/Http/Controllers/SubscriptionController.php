<?php

namespace App\Http\Controllers;

Use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Subscription;

class SubscriptionController extends Controller
{
    public function get($user_id) {
        $subs = Subscription::where('user_id', $user_id)     
            ->with('podcast')
            ->get();

        return $subs;
    }

    public function isSubscribed($user_id, $pod_id) {
        $subs = Subscription::where([
                'user_id' => $user_id,
                'podcast_id' => $pod_id
            ])     
            ->get();

        return $subs;
    }

    public function subscribe($user_id, $pod_id) {
        $sub = new Subscription();

        $sub->user_id = $user_id;
        $sub->podcast_id = $pod_id;
        $sub->date = Carbon::now();

        $sub->save();

        return $sub;
    }

    public function unSubscribe($user_id, $pod_id) {
        $subs = Subscription::where([
                'user_id' => $user_id,
                'podcast_id' => $pod_id
            ])     
            ->get();

        $sub = $subs[0];

        $sub->delete();

        return $sub;
    }
}
