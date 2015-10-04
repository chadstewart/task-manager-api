<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */

    public function __construct()
    {
       // Apply the jwt.auth middleware to all methods in this controller
       // except for the authenticate method. We don't want to prevent
       // the user from retrieving their token if they don't already have it
       $this->middleware('jwt.auth', ['except' => ['authenticate']]);
    }

    public function index()
    {
        return [
            'activitybooks_url' => url('/activitybooks'),
            'activitybook_url' => url('/activitybooks/{activitybook}'),
	    'activities_url' => url('/activities'),
            'activity_url' => url('/activities/{activity}'),
            'tasks_url' => url('/tasks'),
            'task_url' => url('/tasks/{task}'),
            'tasklists_url' => url('/tasklists'),
            'tasklist_url' => url('/tasklists/{tasklist}')
            //'checklists_url' => url('/checklists'),
            //need to be done later
            //'users_url' => url('/users'),
            //'user_url' => url('/users/{user}'),
        ];
    }
}
