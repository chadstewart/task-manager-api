<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
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
