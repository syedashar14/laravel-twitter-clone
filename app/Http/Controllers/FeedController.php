<?php

namespace App\Http\Controllers;

use App\Models\Idea;
use Illuminate\Http\Request;

class FeedController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke()
    {
        $user = auth()->user();
        $following = $user->followings()->pluck('user_id');
        $ideas = Idea::whereIn('user_id', $following)->latest();
        if (request()->has('search')) {
            $ideas = $ideas->search(request()->get('search',''));
        }
        return view('dashboard', [
            'ideas' => $ideas->paginate(5)
        ]);
    }
}
