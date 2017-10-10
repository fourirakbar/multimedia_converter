@extends('layouts.layouts')
@section('content')
<section class="content-header">
      <h1>
        Converter Video
      </h1>
      <ol class="breadcrumb">
        <li><a href="/home"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Converter Video</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
            @if ($message = Session::get('success'))
              <div class="alert alert-success">
                <form action="{{ route('video.download') }}" method="post">
                  {{csrf_field()}}
                  <input class="hidden" type="text" value="{{ $message['filename'] }}" name="file_download">
                  <label>{{ $message['message'] }} </label> 
                  <button class="btn btn-primary" type="submit">Download</button>
                </form>
              </div>
            @endif
            @if ($message = Session::get('error'))
              <div class="alert alert-danger">
                <p>{{ $message }}</p>
              </div>
            @endif
            <div class="box-header with-border">
              <h3 class="box-title">Upload Video</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" enctype="multipart/form-data" method="POST" role="form" action="{{ route("video.convert") }}" onclick="getdate()">

                <div class="box-body">
                	{{csrf_field()}} 
                	<div class="form-group"> 
	                  <label>Upload Video</label> 
	                  <input type="file" name="nama_video" required=""> 
                	</div>               

                <div class="form-group"> 
                  <label>Pilih Format</label> 
                  
	              <select class="form-control" name="formatVideo">
	              	<option disabled selected value><b>-- Pilih Menu Dibawah --</b></option>
	              	
	              	<option value="mp4">MP4</option>
	              	<option value="avi">AVI</option>
	              	<option value="webm">WEBM</option>

	              </select>
                </div>

                <div class="form-group">
                  <label>Width Video</label>
                  <input class="form-control" placeholder="Width" name="width" required="">
                </div>

                <div class="form-group">
                  <label>Height Video</label>
                  <input class="form-control" placeholder="Height" name="height" required="">
                </div>

                <div class="form-group"> 
                  <label>Bitrate Video</label> 
                  
                  <select class="form-control" name="bitrate">
                    <option disabled selected value><b>-- Pilih Bitrate Dibawah --</b></option>
                    <option value="56">56k</option>
                    <option value="96">96k</option>
                    <option value="128">128k</option>
                    <option value="160">160k</option>
                    <option value="192">192k</option>
                    <option value="320">320k</option>

                </select>
                </div>

                <div class="form-group"> 
                  <label>Audio Channel Video</label> 
                  
                  <select class="form-control" name="audioChannel">
                    <option disabled selected value><b>-- Pilih Audi Channel Dibawah --</b></option>
                    <option value="1">Mono</option>
                    <option value="2">Stereo</option>

                </select>
                </div>

                <div class="form-group"> 
                  <label>Frame Rate Video</label> 
                  
                  <select class="form-control" name="frameRate">
                    <option disabled selected value><b>-- Pilih Frame Rate Dibawah --</b></option>
                    <option value="25">25</option>
                    <option value="30">30</option>
                    <option value="60">60</option>

                </select>
                </div>

                <!-- <div class="form-group">
                  <label>Audio Kilo BitRate</label>
                  <input class="form-control" placeholder="Audio Kilo BitRate" name="audiokilobitrate" required="">
                </div> -->

            </div>
                


                
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
            </form>
          </div>

              </form>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!--/.col (right) -->
      </div>
      <!-- /.row -->
    </section>
@endsection
@section('javas')
<!-- date-range-picker -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js"></script>
<script src="../../plugins/daterangepicker/daterangepicker.js"></script>
<!-- bootstrap datepicker -->
<script src="../../plugins/datepicker/bootstrap-datepicker.js"></script>
@endsection

