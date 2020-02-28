<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Outbreak\Outbreak;


class OutbreakController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index(Request $request)
    {
        return Outbreak::all();
    }

    public function show(Outbreak $outbreak)
    {
        return $outbreak;
    }

    public function store(Request $request)
    {
        $outbreak = Outbreak::create($request->all());

        return response()->json($outbreak, 201);
    }

    public function update(Request $request, Outbreak $outbreak)
    {
        $outbreak->update($request->all());

        return response()->json($outbreak, 200);
    }

    public function delete(Request $request, Outbreak $outbreak)
    {
        $outbreak->delete();

        return response()->json(null, 204);
    }
}