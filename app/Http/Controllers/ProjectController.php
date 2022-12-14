<?php

namespace App\Http\Controllers;

use App\Http\Requests\Project\ProjectRequest;
use App\Models\Client;
use App\Models\Project;
use App\Models\User;
use Illuminate\Database\QueryException;
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
        $projects = Project::with(['user', 'client'])->paginate(15);

        return view('projects.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::all();
        $clients = Client::all();

        return view('projects.create', compact(['users', 'clients']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  ProjectRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProjectRequest $request)
    {
        Project::create($request->validated());

        return redirect()->route('projects.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  Project  $project
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Project  $project
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    {
        $users = User::all();
        $clients = Client::all();

        return view('projects.edit', compact(['project', 'users', 'clients']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  ProjectRequest  $request
     * @param  Project  $project
     * @return \Illuminate\Http\Response
     */
    public function update(ProjectRequest $request, Project $project)
    {
        $project->update($request->validated());

        return redirect()->route('projects.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
        try {
            $project->forceDelete();
        } catch (QueryException $e) {
            return redirect()->route('clients.index')->withErrors(['status' => 'Can\'t delete project. Delete the task that is associated with this project first.']);
        }

        return redirect()->route('projects.index');
    }
}
