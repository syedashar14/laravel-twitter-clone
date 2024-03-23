<?php

namespace App\Http\Controllers;

use App\Models\Idea;
use Illuminate\Http\Request;

class LikeController extends Controller
{
    public function like (Idea $idea) {
        $liker = auth()->user();
        $liker->likes()->attach($idea);
        return redirect()->route('dashboard')->with('success', 'Idea liked successfully');
    }

    public function unlike (Idea $idea) {
        $liker = auth()->user();
        $liker->likes()->detach($idea);
        return redirect()->route('dashboard')->with('success', 'Idea unliked successfully');
    }
}
