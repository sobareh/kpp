<?php

namespace App\Http\Controllers;

use App\TaskList;
use Illuminate\Http\Request;

class TaskListController extends Controller
{
    public function index() {
        $data = TaskList::paginate();

        return view('pages.home', ["name" => $data]);
    }

    public function create(Request $request) {
        $dataJson = json_decode($request->getContent());

        dd($dataJson);

    }
}
