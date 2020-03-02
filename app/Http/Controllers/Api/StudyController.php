<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repository\StudyRepository;
use App\Study\Study;

class StudyController extends Controller
{
    protected $_model;

    public function __construct(Study $study)
    {
        $this->middleware('auth');
        $this->_model = new Repository($study);
    }
    
    public function index(Request $request)
    {
        // return Study::all();
        return $this->_model->all();
    }

    // public function show(Study $study)
    public function show($id)
    {
        return $this->_model->show($id);
    }

    public function store(Request $request)
    {
        // $study = Study::create($request->all());

        $this->validate($request, [
           // 'body' => 'required|max:500'
        ]);

        // create record and pass in only fields that are fillable
        $study = $this->_model->create($request->only($this->_model->getModel()->fillable));

        return response()->json($study, 201);
    }

    // public function update(Request $request, Study $study)
    public function update(Request $request, $id)
    {
        // $study->update($request->all());
        // update model and only pass in the fillable fields
        $this->_model->update($request->only($this->_model->getModel()->fillable), $id);

        $study = $this->model->find($id);

        return response()->json($study, 200);
    }

    // public function delete(Request $request, Study $study)
    public function delete(Request $request, $id)
    {
        // $study->delete();
        $this->_model->delete($id);

        return response()->json(null, 204);
    }
}