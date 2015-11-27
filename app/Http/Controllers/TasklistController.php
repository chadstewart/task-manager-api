<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Tasklist;
use Dingo\Api\Routing\Helpers;

class TasklistController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        return Tasklist::all()->toJson();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        if($tasklist = Tasklist::create($request->all())){
            return $tasklist->toJson();
        } else{
            return $this->response->error('Tasklist could not be created.', 404);
	}
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        return Tasklist::with('tasks')->findOrFail($id)->toJson();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        $Tasklist = Tasklist::findOrFail($id);
        if($Tasklist->update($request->all())){
            return "Tasklist updated successfully.";
        } else{
            return $this->response->error('Tasklist could not be created.', 404);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        if(Tasklist::destroy($id)){
            return "Tasklist deleted successfully.";
        } else{
            return $this->response->error('Tasklist does not exist.', 404);
        }
    }
}
