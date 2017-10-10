@extends('layouts.layouts')
@section('content')
<section class="content-header">
      <h1>
        Converter Audio
      </h1>
      <ol class="breadcrumb">
        <li><a href="/home"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Converter Audio</li>
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
                <form action="{{ route('audio.download') }}" method="post">
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
              <h3 class="box-title">Upload Audio</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" enctype="multipart/form-data" method="POST" role="form" action="{{ route("audio.convert") }}" onclick="getdate()">
              <div class="box-body">
                {{csrf_field()}} 
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group"> 
                      <label>Upload Audio</label> 
                      <input type="file" name="audio" required=""> 
                    </div> 
                  </div>
                  <div class="col-md-6 col-xs-12">
                    <div class="form-group"> 
                      <label>Pilih Format</label>    
                      <select required class="form-control" name="output_audio">
                        <option selected value><b>-- Pilih Format Output --</b></option>
                        <option value="mp3" >mp3</option>
                        <option value="flac" >flac</option>
                        <option value="ac3" >ac3</option>
                        <option value="aiff" >aiff</option>
                        <option value="ogg"  >ogg</option> 
                      </select>
                    </div>
                  </div>
                  <div class="col-md-6 col-xs-12">
                    <div class="form-group"> 
                      <label>Sample Rate</label>    
                      <select class="form-control" name="sample_rate">
                        <option selected value><b>-- Pilih Sample Rate --</b></option>
                        <option value="8000" >8000</option>
                        <option value="11025" >11025</option>
                        <option value="16000" >16000</option>
                        <option value="22050" >22050</option>
                        <option value="32000" >32000</option>
                        <option value="37800" >37800</option>
                        <option value="44056" >44056</option>
                        <option value="44100" >44100</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-6 col-xs-12">
                    <div class="form-group"> 
                      <label>Bitrate</label>    
                      <select class="form-control" name="bitrate">
                        <option selected value><b>-- Pilih Bitrate --</b></option>
                        <option value="56k">56k</option>
                        <option value="96k">96k</option>
                        <option value="128k">128k</option>
                        <option value="160k">160k</option>
                        <option value="192k">192k</option>
                        <option value="320k">320k</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-6 col-xs-12">
                    <div class="form-group"> 
                      <label>Channel</label>    
                      <select class="form-control" name="channel">
                        <option selected value><b>-- Pilih Channel --</b></option>
                        <option value="1">Mono</option>
                        <option value="2">Stereo</option>
                      </select>
                    </div> 
                  </div> 
                </div>                            
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <button type="submit" class="btn btn-primary pull-right">Submit</button>
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
