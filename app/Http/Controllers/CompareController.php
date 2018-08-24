<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Imagick;

class CompareController extends Controller
{
    /**
     * Compare two images.
     *
     * @return \Illuminate\Http\Response
     */
    public function compare(Request $request)
    {
		$image1 = new imagick($request->image1);
		$image2 = new imagick($request->image2);

		$result = $image1->compareImages($image2, Imagick::METRIC_MEANSQUAREERROR);
		$result[0]->setImageFormat("png");

		header("Content-Type: image/png");
		echo $result[0];
        return view('Clients.pedidos.index',compact('tipo'));
    }
}
