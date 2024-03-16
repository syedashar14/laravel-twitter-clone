<?php

namespace App\Http\Controllers;

use App\Models\Idea;
use Illuminate\Http\Request;

class IdeaController extends Controller
{

    public function show (Idea $idea) {
        return view('ideas.show', compact('idea'));
    }

    public function edit (Idea $idea) {
        if (auth()->user()->id != $idea->user_id) {
            abort(404, "You are not allowed to edit this Idea");
        }
        $inEdit = true;
        return view('ideas.show', compact('idea', 'inEdit'));
    }

    public function store () {
        $validated = request()->validate(
            ['content' => 'required|min:5|max:240']
        );
        $validated['user_id'] = auth()->user()->id;
        // $idea = Idea::create([
        //     'content' => request()->get('content')]
        // );
        $idea = Idea::create($validated);
        $idea->save();
        return redirect()->route('dashboard')->with('success', 'Idea created successfully');
    }

    public function update (Idea $idea) {
        if (auth()->user()->id != $idea->user_id) {
            abort(404, "You are not allowed to update this Idea");
        }
        $validated = request()->validate(
            ['content' => 'required|min:5|max:240']
        );
        // $idea->content = request()->get('content');
        // $idea->save();
        $idea->update($validated);
        return redirect()->route('ideas.show', $idea->id)->with('ideaUpdatedSuccess', 'Idea updated successfully');
    }

    public function destroy (Idea $idea) {
        if (auth()->user()->id != $idea->user_id) {
            abort(404, "You are not allowed to edit this Idea");
        }
        //Idea::where('id', $id)->firstOrFail()->delete();
        $idea->delete();
        return redirect()->route('dashboard')->with('ideaDeletedSuccess', 'Idea deleted successfully');
    }
}
