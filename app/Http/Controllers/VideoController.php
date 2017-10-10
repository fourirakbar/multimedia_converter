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
    	// $inFile = $request->input;
    	// $outFile = $request->output;
    	$height = $request->height;
    	$width = $request->width;
    	$bitrate = $request->bitrate;
    	$audioChannel = $request->audioChannel;
    	$fileFormat = $request->formatVideo;
    	$frameRate = $request->frameRate;

    	$path = public_path(); //define public path laravel
    	$time = date("now"); //to show date
    	$milliseconds = round(microtime(true) * 1000); //get time in ms
    	$file = $request->file('nama_video'); //set nama_image to $file

    	$take = $file->getClientOriginalName(); //get name of image
    	$takes = explode(".", $take); //separate name of image with "."
    	
    	$nama = $time."_".$file->getClientOriginalName(); //name file that used to store in /uploads/original
    	$nama_baru = $time."_".$takes[0].".".$request->formatVideo; //name file that used to store in /uploads/convert
    	$destinationPath = 'uploads/original'; //define destination path
    	$destinationConvert = 'uploads/convert'; //define destination convert

    	$execString = "ffmpeg -i /home/fourirakbar/Videos/". $take
	    		." -ac ". $audioChannel
	    		." -r ". $frameRate
	    		." -s ". $width. "x". $height 
	    		." -aspect ". $width .":". $height 
	    		." -b:v ". $bitrate ."k"
	    		." -bufsize ". $bitrate ."k"
	    		." -maxrate ". $bitrate ."k"
	    		." -sn -f ". $fileFormat 
	    		." -y ".$path."/uploads/convert/".$nama_baru;


    	if ($file->move($destinationPath,$nama)) { //get file in /uploads/original
    		// dd($nama_baru);
	    	exec($execString,
	    		$output, 
	    		$status);
	    }


	    $millisecondsend = round(microtime(true) * 1000); //get time in ms after process convert
		$hasil = (float)$millisecondsend - $milliseconds; //difference beetween get time in ms before process and git time in ms after process convert 

		//return to image.index with button download
    	return redirect(route('video.index'))->
										with('success', array('message' => 'Sukses Convert Image Selama '.$hasil.' ms. Klik tombol Download untuk download file hasil', "filename" => $nama_baru));










    	// dd($request->all());
    	// $format = $request->format_video;
    	// $time = date("now");
    	// // dd($format);
    	// $temp;
    	
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
    	
   //  	$file = $request->file('nama_video');
   //  	$nama = $time."_".$file->getClientOriginalName();
   //  	$destinationPath = 'uploads/original';
   //  	$destinationConvert = 'uploads/convert';

   //  	if ($format == "wmv") {
   //  		$temp = new \FFMpeg\Format\Video\wmv();

   //  		if ($file->move($destinationPath,$nama)) {
	  //   		$ffmpeg = \FFMpeg\FFMpeg::create();

			// 	$video = $ffmpeg->open($destinationPath."/".$nama);
				
			// 	$video
			// 	    ->filters()
			// 	    ->resize(new FFMpeg\Coordinate\Dimension($request->width, $request->height))
			// 	    ->synchronize();
			// 	$temp
	  //   			->setKiloBitrate($request->bitrate)
	  //   			->setAudioChannels($request->audiochannel)
	  //   			->setAudioKiloBitrate($request->audiokilobitrate);
			// 	$video
	  //   			->save($temp, $destinationConvert.'/'.$nama.'.'.$format);
			// }
   //  	}

   //  	if ($format == "avi") {

   //  		if ($file->move($destinationPath, $nama)) {
   //  			$ffmpeg = \FFMpeg\FFMpeg::create();
   //  			$formats = new FFMpeg\Format\Video\X264();
   //  			$video = $ffmpeg->open($destinationPath."/".$nama);
			// 	$formats->on('progress', function ($video, $formats, $percentage) {
			// 	    echo "$percentage % transcoded";
			// 	});

			// 	$formats
			// 	    ->setKiloBitrate(1000)
			// 	    ->setAudioChannels(2)
			// 	    ->setAudioKiloBitrate(256);

			// 	$video->save($formats, 'video.avi');  			
   //  		}
   //  	}

    	return redirect('/video')->with('success', 'Sukses Convert Video');

	}
}
