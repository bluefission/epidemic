<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Study\Study;


class StudyController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index(Request $request)
    {
        return Study::all();
    }

    public function show(Study $study)
    {
        return $study;
    }

    public function store(Request $request)
    {
        $study = Study::create($request->all());

        return response()->json($study, 201);
    }

    public function update(Request $request, Study $study)
    {
        $study->update($request->all());

        return response()->json($study, 200);
    }

    public function delete(Request $request, Study $study)
    {
        $study->delete();

        return response()->json(null, 204);
    }
}