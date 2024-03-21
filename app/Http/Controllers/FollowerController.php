<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class FollowerController extends Controller
{
    public function follow (User $user) {
        $follower = auth()->user();
        $follower->followings()->attach($user); // here you can also pass user->id
        return redirect()->route('users.show', $user->id)->with('success', "User followed successfully");
    }

    public function unfollow (User $user) {
        $follower = auth()->user();
        $follower->followings()->detach($user); // here you can also pass user->id
        return redirect()->route('users.show', $user->id)->with('success', "User unfollowed successfully");
    }
}
