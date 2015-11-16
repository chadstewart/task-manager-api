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

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        return User::all();
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
	$userInput = $request->all();
	$userInput["password"] = Hash::make($userInput["password"]);
        if(User::create($userInput)){
            return "User created successfully.";
        } else{
            return $this->response->error('User could not be created.', 404);
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
       return User::findOrFail($id);
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
	$userInput = $request->all();
	if ($userInput->has("password")) {
    		$userInput["password"] = Hash::make($userInput["password"]);
	}
        $User = User::findOrFail($id);
        if($User->update($userInput)){
            return "User updated successfully.";
        } else{
            return $this->response->error('User could not be updated.', 404);
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
            return "User deleted successfully.";
        } else{
            return $this->response->error('User does not exist.', 404);
        }
    }
}
