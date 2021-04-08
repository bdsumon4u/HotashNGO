<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProjectRequest;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    private string $collection = 'projects';

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projects = Project::with('media', 'translations')
            ->latest('id')
            ->paginate(12);
        return view('admin.projects.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.projects.editor', [
            'project' => new Project,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param ProjectRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProjectRequest $request)
    {
        Project::create($request->validationData())
            ->addMedia($request->thumbnail)
            ->toMediaCollection($this->collection);

        $this->banner('New Project is Created.');

        return redirect()->action([static::class, 'index']);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    {
        return view('admin.projects.editor');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param ProjectRequest $request
     * @param \App\Models\Project $project
     * @return \Illuminate\Http\Response
     */
    public function update(ProjectRequest $request, Project $project)
    {
        $project->update($request->validationData());
        if ($request->hasFile('thumbnail')) {
            $project->clearMediaCollection($this->collection);
            $project->addMedia($request->thumbnail)
                ->toMediaCollection($this->collection);
        }

        $this->banner('The Project is Updated.');

        return redirect()->action([static::class, 'index']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
        $project->delete();

        $this->banner('The Project is Deleted.');

        return redirect()->action([static::class, 'index']);
    }
}
