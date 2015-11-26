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

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        return Activitybook::all()->toJson();
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        if(Activitybook::create($request->all())){
            return "Activitybook created successfully.";
        } else{
            return $this->response->error('Activitybook could not be created.', 404);
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
       return Activitybook::with('activities')->findOrFail($id)->toJson();
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
        $Activitybook = Activitybook::findOrFail($id);
        if($Activitybook->update($request->all())){
            return "Activitybook updated successfully.";
        } else{
            return $this->response->error('Activitybook could not be created.', 404);
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
        if(Activitybook::destroy($id)){
            return "Activitybook deleted successfully.";
        } else{
            return $this->response->error('Activity book does not exist.', 404);
        }
    }
}
