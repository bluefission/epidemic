<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use App\Outbreak\Outbreak;
use App\Study\Study;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $outbreaks = Outbreak::all();
        return view('admin.index', ['oubtbreaks'=>$oubtbreaks]);
    }

    public function study(Outbreak $outbreak, Study $study)
    {
        // dd($outbreak->themes[0]->themes);
        return view('admin.study', ['outbreak'=>$outbreak, 'study'=>$study]);
    }

    public function outbreaks()
    {
        $outbreaks = Outbreak::all();
        return view('admin.outbreaks', ['outbreaks'=>$outbreaks]);
    }

    public function oubtreak(Outbreak $outbreak)
    {   
        return view('admin.outbreak', ['outbreak'=>$outbreak]);
    }
}
