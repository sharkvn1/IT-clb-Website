<?php

namespace App\Http\Controllers;

use App\Models\projectDetails;
use App\Http\Requests\V1\StoreProjectDetailRequest;
use App\Http\Requests\V1\UpdateProjectDetailRequest;

class ProjectDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProjectDetailRequest $request)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(projectDetails $projectDetail)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProjectDetailRequest $request, projectDetails $projectDetail)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(projectDetails $projectDetail)
    {
        //
    }
}
