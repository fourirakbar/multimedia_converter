<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use FFMpeg;
// use FFProbe;


class VideoController extends Controller
{
    public function index() {
    	// phpinfo();
    	return view('video.indexVideo');
    }


    public function convert(Request $request) {
    	// dd($request->all());
    	$format = $request->format_video;
    	$time = date("now");
    	// dd($format);
    	$temp;
    	
    	// else if ($format == "mp4") {
    	// 	$temp = new \FFMpeg\Format\Video\WMV();
    	// }
    	// else if ($format == "webm") {
    	// 	$temp = new \FFMpeg\Format\Video\WebM();	
    	// }
    	// dd($temp);
    	// phpinfo();
    	// exit();
    	// set_time_limit(0);
    	
    	$file = $request->file('nama_video');
    	$nama = $time."_".$file->getClientOriginalName();
    	$destinationPath = 'uploads/original';
    	$destinationConvert = 'uploads/convert';

    	if ($format == "wmv") {
    		$temp = new \FFMpeg\Format\Video\wmv();

    		if ($file->move($destinationPath,$nama)) {
	    		$ffmpeg = \FFMpeg\FFMpeg::create();

				$video = $ffmpeg->open($destinationPath."/".$nama);
				
				$video
				    ->filters()
				    ->resize(new FFMpeg\Coordinate\Dimension($request->width, $request->height))
				    ->synchronize();
				$temp
	    			->setKiloBitrate($request->bitrate)
	    			->setAudioChannels($request->audiochannel)
	    			->setAudioKiloBitrate($request->audiokilobitrate);
				$video
	    			->save($temp, $destinationConvert.'/'.$nama.'.'.$format);
			}
    	}

    	if ($format == "avi") {

    		if ($file->move($destinationPath, $nama)) {
    			$ffmpeg = \FFMpeg\FFMpeg::create();
    			$formats = new FFMpeg\Format\Video\X264();
    			$video = $ffmpeg->open($destinationPath."/".$nama);
				$formats->on('progress', function ($video, $formats, $percentage) {
				    echo "$percentage % transcoded";
				});

				$formats
				    ->setKiloBitrate(1000)
				    ->setAudioChannels(2)
				    ->setAudioKiloBitrate(256);

				$video->save($formats, 'video.avi');  			
    		}
    	}

		
    	// echo "kontol";
    	return redirect('/video')->with('success', 'Sukses Convert Video');

	}
}
