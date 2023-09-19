<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;

class homeController extends Controller
{
    public function getPage(Request $request)
    {
        $seo = DB::table('seo_properties')->where('pageName', '=', 'home')->first();
        return view('pages.home', ['seo' => $seo]);
    }

    public function getHeroData(Request $request)
    {
        return DB::table('hero_properties')->first();
    }

    public function getAboutData(Request $request)
    {
        return DB::table('abouts')->first();
    }

    public function getSocialData(Request $request)
    {
        return DB::table('socials')->first();
    }

}