<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;
use View;

class contactController extends Controller
{
    public function getPage(Request $request)
    {
        $seo = DB::table('seo_properties')->where('pageName', '=', 'contact')->first();
        return view('pages.contact', ['seo' => $seo]);
    }


    public function contactRequest(Request $request)
    {
        return DB::table('contacts')->insert($request->input());
    }
}