<?php

namespace App\Http\Controllers\Api;

use App\TaskUser;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TasklistController extends Controller
{
    public function store(Request $request)
    {

        $data = json_decode($request->getContent(), true);
        
        // foreach ($data as $item) {
        //     $tasklist = new TaskUser;
        //     $tasklist->task_id = 1;
        //     $tasklist->user_id = $item["userId"];
        //     $tasklist->priority = intval($item["priority"]);
        //     $tasklist->save();
        // }

        $dataResponse = json_encode($data, true);

        return response()->json([
            'message' => 'Success Test API Endpoint',
            'success' => true,
            'data' => $dataResponse
        ], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
