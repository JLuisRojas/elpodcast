<?php

namespace App\Http\Controllers;

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
}
