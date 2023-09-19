<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;

class resumeController extends Controller
{
    public function getPage(Request $request)
    {
        $seo = DB::table('seo_properties')->where('pageName', '=', 'resume')->first();
        return view('pages.resume', ['seo' => $seo]);
    }

    public function getResumeLink(Request $request)
    {
        return DB::table('resumes')->first();
    }

    public function getExperiencesData(Request $request)
    {
        return DB::table('experiences')->get();
    }

    public function getEducationData(Request $request)
    {
        return DB::table('educations')->get();
    }

    public function getSkillsData(Request $request)
    {
        return DB::table('skills')->get();
    }

    public function getLanguageData(Request $request)
    {
        return DB::table('languages')->get();
    }
}