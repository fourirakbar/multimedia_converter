<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ImageController extends Controller
{
    public function index()  {
    	return view ('image.indexImage');
    }

    public function convert(Request $request) {
    	$path = public_path();
    	$time = date("now");

    	$file = $request->file('nama_image');

    	$take = $file->getClientOriginalName();
    	$takes = explode(".", $take);
    	
    	$nama = $time."_".$file->getClientOriginalName();
    	$nama_baru = $time."_".$takes[0].".".$request->format_image;
    	$destinationPath = 'uploads/original';
    	$destinationConvert = 'uploads/convert';

    	if ($file->move($destinationPath,$nama)) {
    		exec('ffmpeg -i /home/fourirakbar/Pictures/'.$take.' -vf scale='.$request->width.':'.$request->height.' '.$path.'/uploads/convert/'.$nama_baru.' ; convert '.$path.'/uploads/convert/'.$nama_baru.' -colorspace '.$request->colorspace.' -depth '.$request->depth.' '.$path.'/uploads/convert/'.$nama_baru ,$output, $status);
    	}

    	return redirect(route('image.index'))->
										with('success', array('message' => 'Sukses Convert Image. Klik tombol Download untuk download file hasil', "filename" => $nama_baru));
    }

    public function download(Request $request)
	{
		$target_file = public_path()."/uploads/convert/".$request->file_download;
		if(!$request->file_download)
		{
			return redirect(route('audio.index'))->with('error', 'Gagal mengunduh Audio hasil convert');
		}

		if(file_exists($target_file))
		{
			header('Content-Description: File Transfer');
            header('Content-Type: application/octet-stream');
            header('Content-Disposition: attachment; filename="'.explode('_',$request->file_download)[1].'"');
            header('Cache-Control: private');
            header('Content-Length: '.filesize($target_file));
            header('Pragma: public');
            ob_clean();
            flush();
            readfile($target_file);
		}

		return redirect(route('audio.index'))->with('error', 'Gagal mengunduh Audio hasil convert');
	}
}
