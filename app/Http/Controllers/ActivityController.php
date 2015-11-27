<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Activity;
use Dingo\Api\Routing\Helpers;

class ActivityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        return Activity::all()->toJson();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        if($activity = Activity::create($request->all())){
            return $activity->toJson();
        } else{
            return $this->response->error('Activity could not be created.', 404);
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
        return Activity::with('tasklists')->findOrFail($id)->toJson();
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
        $Activity = Activity::findOrFail($id);
        if($Activity->update($request->all())){
            return "Activity updated successfully.";
        } else{
            return $this->response->error('Activity could not be created.', 404);
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
        if(Activity::destroy($id)){
            return "Activity deleted successfully.";
        } else{
            return $this->response->error('Activity does not exist.', 404);
        }
    }
}
