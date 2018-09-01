<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Jenssegers\ImageHash\ImageHash;
use Jenssegers\ImageHash\Implementations\PerceptualHash;
use Imagick;
use Storage;
//require_once '/var/www/kinbu-fingerprint/resources/assets/PayUPhpSdk/lib/PayU.php';

class CompareController extends Controller
{
    /**
     * Compare two images.
     *
     * @return \Illuminate\Http\Response
     */
    public function compare(Request $request)
    {
    	switch ($request->method) {
    		case 'imagehash':
				/*METHOD IMAGEHASH*/
				$hasher = new ImageHash(new PerceptualHash());
				$hash1 = $hasher->hash($request->file('image1')->getRealPath());
				$hash2 = $hasher->hash($request->file('image2')->getRealPath());

				$distance = $hasher->distance($hash1, $hash2);
				$method = "ImageHash";
				$scan = $distance;
    			break;

    		case 'imagick':
				/*METHOD IMAGICK */
				$image1 = new imagick($request->file('image1')->getRealPath());
				$image2 = new imagick($request->file('image2')->getRealPath());

				$result = $image1->compareImages($image2, Imagick::METRIC_MEANSQUAREERROR);
				$result[0]->setImageFormat("png");

				header("Content-Type: image/png");

				$method = "Imagick";
				$scan = $result[1];
    			break;
    		default:
    			dd("Debe seleccionar algún método disponible.");
   			break;
    	}

		return view('preview-report', ['scan' => $scan, 'method'=>$method, 'picture'=>$request->picture]);

    }
}
