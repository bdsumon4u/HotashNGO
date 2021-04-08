<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projects = Project::with('media', 'translations')
            ->when(request()->has('category'), function ($query) {
                $query->where('category', request('category'));
            })
            ->latest('id')
            ->paginate(8);

        return view('pages.projects.index', compact('projects'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {
        return view('pages.projects.show');
    }
}
