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
            'tasks_url' => url('/tasks')
            //'task_url' => url('/tasks/{task}'),
            //'checklists_url' => url('/checklists'),
            //'checklist_url' => url('/checklists/{checklist}'),
            //need to be done later
            //'taskbooks_url' => url('/taskbooks'),
            //'taskbook_url' => url('/taskbooks/{taskbook}'),
            //'users_url' => url('/users'),
            //'user_url' => url('/users/{user}'),
        ];
    }
}
