<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Charity;

class SearchController extends Controller
{
    //
    public function index(Request $request)
    {
        $charitys = [];
        $charitys = Charity::all();

        return view('search.index')->with([
            'charitys' => $charitys
        ]);
    }
}
