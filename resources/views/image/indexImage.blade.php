@extends('layouts.layouts')
@section('content')
<section class="content-header">
      <h1>
        Converter Image
      </h1>
      <ol class="breadcrumb">
        <li><a href="/home"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Converter Image</li>
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
                <p>{{ $message }}</p>
              </div>
            @endif
            <div class="box-header with-border">
              <h3 class="box-title">Upload Image</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" enctype="multipart/form-data" method="POST" role="form" action="{{ route("image.convert") }}" onclick="getdate()">

                <div class="box-body">
                	{{csrf_field()}} 
                	<div class="form-group"> 
	                  <label>Upload Image</label> 
	                  <input type="file" name="nama_image" required=""> 
                	</div>               

                <div class="form-group"> 
                  <label>Pilih Format</label> 
                  
	              <select class="form-control" name="format_image">
	              	<option disabled selected value><b>-- Pilih Menu Dibawah --</b></option>
	              	<option value="bmp">bmp</option>
	              	<option value="jpg">jpg</option>
	              	<option value="tiff">tiff</option>
                  <option value="png">png</option>
                  <option value="ppm">ppm</option>
                  <option value="apng">apng</option>
                  <option value="dpx">dpx</option>
                  <option value="pam">pam</option>
                  <option value="pbm">pbm</option>
                  <option value="pcx">pcx</option>
                  <option value="pgm">pgm</option>
                  <option value="xbm">xbm</option>
                  <option value="xface">xface</option>
                  <option value="xwd">xwd</option>

	              </select>
                </div>

                <div class="form-group">
                  <label>Width Image</label>
                  <input class="form-control" placeholder="Width" name="width" required="">
                </div>

                <div class="form-group">
                  <label>Height Image</label>
                  <input class="form-control" placeholder="Height" name="height" required="">
                </div>

                <!-- <div class="form-group">
                  <label>BitRate Video</label>
                  <input class="form-control" placeholder="BitRate" name="bitrate" required="">
                </div>

                <div class="form-group">
                  <label>Audio Channel Video</label>
                  <input class="form-control" placeholder="Audio Channel" name="audiochannel" required="">
                </div>

                <div class="form-group">
                  <label>Audio Kilo BitRate</label>
                  <input class="form-control" placeholder="Audio Kilo BitRate" name="audiokilobitrate" required="">
                </div>
 -->
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
