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
	              	<option value="wmv">WMV</option>
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

                <!-- <div class="form-group">
                  <label>BitRate Video</label>
                  <input class="form-control" placeholder="BitRate" name="bitrate" required="">
                </div> -->

                <div class="form-group">
                  <label>Bitrate Video</label>
                  <input class="form-control" placeholder="Bitrate" name="bitrate" required="">
                </div>

                <div class="form-group">
                  <label>Audio Channel Video</label>
                  <input class="form-control" placeholder="Audio Channel" name="audioChannel" required="">
                </div>

                <div class="form-group">
                  <label>Frame Rate Video</label>
                  <input class="form-control" placeholder="Frame Rate" name="frameRate" required="">
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
