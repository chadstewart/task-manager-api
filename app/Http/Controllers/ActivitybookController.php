<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Activitybook;
use Dingo\Api\Routing\Helpers;

class ActivitybookController extends Controller
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
		if($Activitybook = Activitybook::all()) {
			return response($Activitybook->toJson(), 200)->header('Content-Type', 'json');
		}
    }
	catch(\Exception $e) {
            return response()->json('No Activitybooks found.', 404);
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
		if($Activitybook = Activitybook::create($request->all())){
		    return response($Activitybook->toJson(), 200)->header('Content-Type', 'json');
		}
	} catch(\Exception $e){
            return response()->json('Activitybook could not be created.', 400);
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
		 if($Activitybook = Activitybook::with('activities')->findOrFail($id)){
			return response($Activitybook->toJson(), 200)->header('Content-Type', 'json');
		}
	}
	catch(\Exception $e){
            return response()->json('No Activitybooks found.', 404);
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
		if($Activitybook = Activitybook::findOrFail($id)){
			try{
				if($Activitybook->update($request->all())){
				    return response($Activitybook->toJson(), 200)->header('Content-Type', 'json');
				}
			}
			catch(\Exception $e){
			    return response()->json('Activitybook could not be updated.', 400);
			}
		}
	}
	catch(\Exception $e){
            return response()->json('No Activitybooks found.', 404);
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
		if(Activitybook::destroy($id)){
		    return response()->json('Activitybook deleted successfully.', 200);
		}
	}
	catch(\Exception $e){
            return response()->json('Activitybook does not exist.', 404);
        }
    }
}
