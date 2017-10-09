<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Symfony\Component\Process\Process;
use Symfony\Component\Process\Exception\ProcessFailedException;

use FFMpeg;

class AudioController extends Controller
{
    public function index() {
    	return view ('audio.indexAudio');
    }

	public function convert(Request $request) 
	{
		$time = time('now');
		$bitrate = ($request->bitrate ? " -ab ".$request->bitrate : "");
		$sample_rate = ($request->sample_rate ? " -ar ".$request->sample_rate : "");
		$channel = ($request->channel ? " -ac ".$request->channel : "");

		$file = $request->file('audio');
    	$nama = $time.'_'.$file->getClientOriginalName();
    	$destinationPath = 'uploads/original';
		$destinationConvert = 'uploads/convert';
		$nama_output = $time.'_'.explode(".", $file->getClientOriginalName())[0].".".$request->output_audio;

		$command = "/usr/local/bin/ffmpeg -i ".public_path()."/".$destinationPath."/".$nama.$bitrate." ".$sample_rate.$channel." -y ".public_path()."/".$destinationConvert."/".$nama_output;
		if($file->move($destinationPath,$nama))
		{
			exec($command, $output, $status);
			
			if($status)
			{
				return redirect(route('audio.index'))->with('error', 'Gagal Convert Audio');		
			}
			

			return redirect(route('audio.index'))->
										with('success', array('message' => 'Sukses Convert Audio. Klik tombol Download untuk download file hasil', "filename" => $nama_output));
		}
		else
		{
			return redirect(route('audio.index'))->with('error', 'Sukses Convert Audio');
		}
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
