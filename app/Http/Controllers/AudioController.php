<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use FFMpeg;

class AudioController extends Controller
{
    public function index() {
    	return view ('audio.indexAudio');
    }

    public function convert(Request $request) {
    	$format = $request->format_audio;
    	$time = date("now");

    	$temp;

    	$file = $request->file('nama_audio');
    	$nama = $time."_".$file->getClientOriginalName();
    	$destinationPath = 'uploads/original';
    	$destinationConvert = 'uploads/convert';

    	if ($file->move($destinationPath, $nama)) {
    		$ffmpeg = \FFMpeg\FFMpeg::create();
    		$audio = $ffmpeg->open($destinationPath."/".$nama);

    		$format = new FFMpeg\Format\Audio\Flac();
    		$format->on('progress', function ($audio, $format, $percentage) {
			    echo "$percentage % transcoded";
			});

			$format
				->setAudioChannels(1)
				->setAudioKiloBitrate(256);

			$audio->save($format, 'track.flac');
    	}

    	return redirect('/audio')->with('success', 'Sukses Convert Audio');
    }
}
