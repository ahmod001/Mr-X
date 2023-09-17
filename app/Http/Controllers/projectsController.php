<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;

class projectsController extends Controller
{
    public function getPage(Request $request)
    {
        return view('pages.projects');
    }

    public function getProjectsData(Request $request)
    {
        return DB::table('projects')->get();
    }

}