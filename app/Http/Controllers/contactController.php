<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;
use View;

class contactController extends Controller
{
    public function getPage(Request $request)
    {
        return view('pages.contact');
    }


    public function contactRequest(Request $request)
    {
        return DB::table('contacts')->insert($request->input());
    }
}