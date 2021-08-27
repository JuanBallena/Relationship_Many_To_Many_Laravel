<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Job;
use App\Season;
use App\Http\Requests\UpdateJobRequest;

class JobController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // dd(env('VARIABLE_GLOBAL', ''));
        $jobs = Job::all();
        return view('jobs.index', compact('jobs'));
        // return response()->json([
        //     'data' => $jobs,
        //     'message' => 'Hola'
        // ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $seasons = Season::all();

        return view('jobs.create', compact('seasons'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $job = new Job();
        $job->title = $request->title;
        $job->description = $request->description;
        $job->demand = $request->demand;
        $job->save();
        $job->seasons()->attach($request->seasons);

        return redirect()->route('jobs.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $job = Job::findOrFail($id);
        $seasons = Season::all();

        return view('jobs.edit', compact('job','seasons'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateJobRequest $request, $id)
    {
        $job = Job::findOrFail($id);

        $job->title = $request->title;
        $job->description = $request->description;
        $job->demand = $request->demand;
        $job->save();

        $job->seasons()->sync($request->seasons);

        //return redirect()->route('jobs.index');
        return response()->json([
            "message" => 'OK UPDATE'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
