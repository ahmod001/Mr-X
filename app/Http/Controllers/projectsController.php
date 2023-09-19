<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;

class projectsController extends Controller
{
    public function getPage(Request $request)
    {
        $seo = DB::table('seo_properties')->where('pageName', '=', 'projects')->first();
        return view('pages.projects',['seo' => $seo]);
    }

    public function getProjectsData(Request $request)
    {
        return DB::table('projects')->get();
    }

}