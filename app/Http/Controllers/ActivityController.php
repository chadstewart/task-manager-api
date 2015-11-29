<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Activity;
use Dingo\Api\Routing\Helpers;

class ActivityController extends Controller
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
	try{
		if($Activity = Activity::all()) {
			return response($Activity->toJson(), 200)->header('Content-Type', 'json');
		}
    }
	catch(\Exception $e) {
            return response()->json('No Activities found.', 404);
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
	try{
		if($Activity = Activity::create($request->all())){
		    return response($Activity->toJson(), 200)->header('Content-Type', 'json');
		}
	} catch(\Exception $e){
            return response()->json('Activity could not be created.', 400);
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
	 try{
		 if($Activity = Activity::with('tasklists')->findOrFail($id)){
			return response($Activity->toJson(), 200)->header('Content-Type', 'json');
		}
	}
	catch(\Exception $e){
            return response()->json('No Activities found.', 404);
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
	try{
		if($Activity = Activity::findOrFail($id)){
			try{
				if($Activity->update($request->all())){
				    return response($Activity->toJson(), 200)->header('Content-Type', 'json');
				}
			}
			catch(\Exception $e){
			    return response()->json('Activity could not be updated.', 400);
			}
		}
	}
	catch(\Exception $e){
            return response()->json('No Activities found.', 404);
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
	try{
		if(Activity::destroy($id)){
		    return response()->json('Activity deleted successfully.', 200);
		}
	}
	catch(\Exception $e){
            return response()->json('Activity does not exist.', 404);
        }
    }
}
