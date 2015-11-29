<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Hash;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;
use Dingo\Api\Routing\Helpers;

class UserController extends Controller
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
	if($User = User::all()) {
        return response($User->toJson(), 200)->header('Content-Type', 'json');
    } else {
            return $this->response->error('No Users found.', 404);
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
	if($userInput = $request->all()){
		$userInput["password"] = Hash::make($userInput["password"]);
		if($User = User::create($userInput)){
		    return response($User->toJson(), 200)->header('Content-Type', 'json');
		} else{
		    return $this->response->error('User could not be created.', 404);
		}
	} else {
            return $this->response->error('No valid request was sent.', 400);
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
	 if($User = User::findOrFail($id)){
		return response($User->toJson(), 200)->header('Content-Type', 'json');
	} else{
            return $this->response->error('No Users found.', 404);
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
	if($userInput = $request->all()){
		if ($userInput["password"] != null) { //not the best implementation
	    		$userInput["password"] = Hash::make($userInput["password"]);
		}
		$User = User::findOrFail($id);
		if($User->update($userInput)){
		    return response($User->toJson(), 200)->header('Content-Type', 'json');
		} else{
		    return $this->response->error('User could not be updated.', 404);
		}
	} else {
            return $this->response->error('No valid request was sent.', 400);
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
        if(User::destroy($id)){
            return response('User deleted successfully.', 200)->header('Content-Type', 'json');
        } else{
            return $this->response->error('User does not exist.', 404);
        }
    }
}
