<?php

namespace App\Http\Controllers;

use App\Models\Idea;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index () {
        $ideas = Idea::orderBy('created_at', 'DESC');

        //withCount ... withCount added in Idea model to auto fetch the likes with Ideas
        //$ideas = Idea::withCount('likes')->orderBy('created_at', 'DESC');

        if (request()->has('search')) {
            $ideas = $ideas->search(request()->get('search',''));
        }
        return view('dashboard', [
            //'ideas' => Idea::orderBy('created_at', 'DESC')->get() -- Will get all records
            'ideas' => $ideas
        ]);

        //Following code will not work as it is after return
        //It is just a refactored / shorthand code for the above complete code block
        $ideas = Idea::when(request()->has('search'), function (Builder $query) {
            $query->search(request()->get('search',''));
        })->orderBy('created_at', 'DESC')
            ->paginate(5);
    }
}
