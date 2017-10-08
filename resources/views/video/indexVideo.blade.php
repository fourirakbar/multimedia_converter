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
                <p>{{ $message }}</p>
              </div>
            @endif
            <div class="box-header with-border">
              <h3 class="box-title">Upload Video</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" method="POST" role="form" action="{{ URL::to('convert_video') }}" onclick="getdate()">
              <div class="box-body">
                <div class="form-group"> 
                  <label>Nomor Ticket</label> 
                  <input class="form-control" placeholder="Nomor Ticket" name="NOMOR_TICKET" autocomplete="off"> 
                </div> 
                {{csrf_field()}} 
                <div class="form-group"> 
                  <label>Nama Requester</label> 
                  <input class="form-control" placeholder="Nama Requester" name="NAMA_REQUESTER"> 
                </div> 
                {{csrf_field()}}
                <div class="form-group">
                  <label>Bagian</label>
                  <input class="form-control" placeholder="Nama Bagian" name="BAGIAN">
                </div>
                {{csrf_field()}}
                <div class="form-group">
                  <label>Divisi</label>
                  <input class="form-control" placeholder="Nama Divisi" name="DIVISI">
                </div>
                {{csrf_field()}}
                <div class="form-group">
                  <label>Barang yang Dibutuhkan</label>
                  <input class="form-control" placeholder="Nama Barang" name="BARANG_PERMINTAAN">
                </div>
                {{csrf_field()}}
                <div class="textarea-group">
                  <label>Deskripsi</label>
                  <input class="form-control" placeholder="Deskripsi Barang" name="DESKRIPSI">
                </div>
                {{csrf_field()}}
                <div class="form-group">
                <label>Date:</label>

                <div class="input-group date">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input type="date" class="form-control pull-right" id="datepicker" name="TGL_PERMINTAAN">
                </div>
                <!-- /.input group -->
              </div>
                {{csrf_field()}}
                <div class="form-group" hidden="">
                  <label>Tanggal Deadline</label>
                  <input id="datedead" class="form-control" placeholder="" name="TGL_DEADLINE" readonly>
                </div>
                {{csrf_field()}}
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
<script type="text/javascript">
function getdate() {
  var tt = document.getElementById('datepicker').value;

  var date = new Date(tt);
  var newdate = new Date(date);
  var deadline = {{ $totaldeadline }}
  newdate.setDate(newdate.getDate() + parseInt(deadline));

  var dd = newdate.getDate();
  var mm = newdate.getMonth() + 1;
  var y = newdate.getFullYear();
  console.log(dd)
  console.log(mm)
  console.log(y)

  var FormattedDate = y + '-' + mm + '-' + dd;
    document.getElementById('datedead').value = FormattedDate;
}
$(function () {
      //Date picker
      $('#datepicker').datepicker({
        format: 'yyyy-mm-dd',
        changeMonth: true,
        changeYear: true,
        autoclose: true
      });
});
</script>
@endsection
