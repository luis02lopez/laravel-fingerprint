<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReportController extends Controller
{
    /**
     * Compare two images.
     *
     * @return \Illuminate\Http\Response
     */
    public function generate(Request $request)
    {
    	return view('greeting', ['name' => 'James']);
    }
}
