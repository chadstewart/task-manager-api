<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Tasklist;
use Dingo\Api\Routing\Helpers;

class TasklistController extends Controller
{

    use Helpers;

    public function __construct()
    {
       // Apply the jwt.auth middleware to all methods in this controller
       // except for the authenticate method. We don't want to prevent
       // the user from retrieving their token if they don't already have it
       $this->middleware('jwt.auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
	if($Tasklist = Tasklist::all()) {
        return response($Tasklist->toJson(), 200)->header('Content-Type', 'json');
    } else {
            return $this->response->error('No Tasklists found.', 404);
        }
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        if($Tasklist = Tasklist::create($request->all())){
            return response($Tasklist->toJson(), 200)->header('Content-Type', 'json');
        } else{
            return $this->response->error('Tasklist could not be created.', 400);
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
	 if($Tasklist = Tasklist::with('tasks')->findOrFail($id)){
		return response($Tasklist->toJson(), 200)->header('Content-Type', 'json');
	} else{
            return $this->response->error('No Tasklists found.', 404);
        }
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
        if($Tasklist = Tasklist::findOrFail($id)){
		if($Tasklist->update($request->all())){
		    return response($Tasklist->toJson(), 200)->header('Content-Type', 'json');
		} else{
		    return $this->response->error('Tasklist could not be updated.', 400);
		}
	} else{
            return $this->response->error('No Tasklists found.', 404);
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
            return response("Tasklist deleted successfully.", 200)->header('Content-Type', 'json');
        } else{
            return $this->response->error('Tasklist does not exist.', 404);
        }
    }
}
