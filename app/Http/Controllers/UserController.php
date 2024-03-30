<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function show(User $user)
    {
        $ideas = $user->ideas()->paginate(5);
        return view('users.show', compact('user', 'ideas'));
    }

    public function edit(User $user)
    {
        $this->authorize('update', $user);
        $ideas = $user->ideas()->paginate(5);
        return view('users.edit', compact('user', 'ideas'));
    }

    public function update(User $user)
    {
        // if (auth()->user()->id != $user->id) {
        //     abort(404, "You are not allowed to update this Idea");
        // }
        $this->authorize('update', $user);
        $validated = request()->validate(
            [
                'image' => 'image',
                'bio' => 'nullable|min:1|max:255',
                'name' => 'required|min:1|max:255'
            ],
        );
        if (request('image')) {
            $imagePath = request()->file('image')->store('profile', 'public');
            $validated['image'] = $imagePath;
            Storage::disk('public')->delete($user->image ?? '');
        }
        $user->update($validated);
        return redirect()->route('profile')->with('success', 'Profile updated successfully');;
    }

    public function profile()
    {
        return $this->show(auth()->user());
    }
}
