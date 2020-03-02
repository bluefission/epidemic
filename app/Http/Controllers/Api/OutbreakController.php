<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repository\OutbreakRepository;
use App\Outbreak\Outbreak;

class OutbreakController extends Controller
{
    protected $_model;

    public function __construct(Outbreak $outbreak)
    {
        $this->middleware('auth');
        $this->_model = new Repository($outbreak);
    }
    
    public function index(Request $request)
    {
        // return Outbreak::all();
        return $this->_model->all();
    }

    // public function show(Outbreak $outbreak)
    public function show($id)
    {
        return $this->_model->show($id);
    }

    public function store(Request $request)
    {
        // $outbreak = Outbreak::create($request->all());

        $this->validate($request, [
           // 'body' => 'required|max:500'
        ]);

        // create record and pass in only fields that are fillable
        $outbreak = $this->_model->create($request->only($this->_model->getModel()->fillable));

        return response()->json($outbreak, 201);
    }

    // public function update(Request $request, Outbreak $outbreak)
    public function update(Request $request, $id)
    {
        // $outbreak->update($request->all());
        // update model and only pass in the fillable fields
        $this->_model->update($request->only($this->_model->getModel()->fillable), $id);

        $outbreak = $this->model->find($id);

        return response()->json($outbreak, 200);
    }

    // public function delete(Request $request, Outbreak $outbreak)
    public function delete(Request $request, $id)
    {
        // $outbreak->delete();
        $this->_model->delete($id);

        return response()->json(null, 204);
    }
}