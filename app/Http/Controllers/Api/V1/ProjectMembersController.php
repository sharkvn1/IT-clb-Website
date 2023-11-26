<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\ProjectMembers;
use App\Http\Requests\V1\StoreProjectMembersRequest;
use App\Http\Requests\V1\BulkStoreProjectMembersRequest;
use App\Http\Requests\V1\UpdateProjectMembersRequest;
use App\Http\Controllers\Controller;

class ProjectMembersController extends Controller
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
    public function store(StoreProjectMembersRequest $request)
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function bulkStore(BulkStoreProjectMembersRequest $request)
    {
        ProjectMembers::insert($request->toArray());
    }

    /**
     * Display the specified resource.
     */
    public function show(ProjectMembers $projectMembers)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ProjectMembers $projectMembers)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProjectMembersRequest $request, ProjectMembers $projectMembers)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ProjectMembers $projectMembers)
    {
        //
    }
}
