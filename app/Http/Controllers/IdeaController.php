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
        $inEdit = true;
        return view('ideas.show', compact('idea', 'inEdit'));
    }

    public function store () {
        $validated = request()->validate(
            ['content' => 'required|min:5|max:240']
        );
        // $idea = Idea::create([
        //     'content' => request()->get('content')]
        // );
        $idea = Idea::create($validated);
        $idea->save();
        return redirect()->route('dashboard')->with('success', 'Idea created successfully');
    }

    public function update (Idea $idea) {
        $validated = request()->validate(
            ['content' => 'required|min:5|max:240']
        );
        // $idea->content = request()->get('content');
        // $idea->save();
        $idea->update($validated);
        return redirect()->route('ideas.show', $idea->id)->with('ideaUpdatedSuccess', 'Idea updated successfully');
    }

    public function destroy ($id) {
        Idea::where('id', $id)->firstOrFail()->delete();
        return redirect()->route('dashboard')->with('ideaDeletedSuccess', 'Idea deleted successfully');
    }
}
