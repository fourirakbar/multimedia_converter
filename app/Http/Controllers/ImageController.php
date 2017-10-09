<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ImageController extends Controller
{
    public function index()  {
    	return view ('image.indexImage');
    }

    public function convert(Request $request) {
    	// dd($request->all());
    	$time = date("now");

    	$file = $request->file('nama_image');

    	$take = $file->getClientOriginalName();
    	$takes = explode(".", $take);
    	// dd($take);
    	// dd($takes[0]);
    	$nama = $time."_".$file->getClientOriginalName();
    	$destinationPath = 'uploads/original';
    	$destinationConvert = 'uploads/convert';

    	if ($file->move($destinationPath,$nama)) {
    		exec('ffmpeg -i /home/fourirakbar/Pictures/'.$take.' -vf scale='.$request->width.':'.$request->height.' /home/fourirakbar/Documents/jarmul/multimedia_converter/public/uploads/convert/'.$takes[0].'.'.$request->format_image,$output, $status);

    		

    		// var_dump($status);
    		// print_r($output);
    		// echo "masuk bos";
    	}
    	

    	return redirect('/image')->with('success', 'Sukses Convert Image');
    }
}
