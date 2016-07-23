@extends('layouts.admin')
@section('css')
<link rel="stylesheet" href="{{url('/css/plugin/datetimepicker/bootstrap-datetimepicker.min.css')}}" media="screen" title="no title" charset="utf-8">
@endsection
@section('content')
<div class="box-title">
  <i class="fa fa-plus-square" aria-hidden="true"></i> កំណត់ត្រាចំណូល
</div>
<form id="formCustomer" class="form-horizontal" method="POST" onsubmit="return false;">
    {{ csrf_field() }}
    <div class="panel panel-default">
        <div class="panel-body">
            <div class="form-group">
                <label class="col-sm-1 control-label" style="width:160px;">ចំណូលក្នុងថ្ងៃខែឆ្នាំ</label>
                <div class="col-sm-1" style="width:200px;">
                    <input type="text" id="incomedate" name="IncomeDate" class="form-control">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-1 control-label" style="width:160px;">ចំនួនទឹកប្រាក់</label>
                <div class="col-sm-1" style="width:200px;">
                    <input type="text" name="TotalAmount" class="form-control">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-1 control-label" style="width:160px;">កំណត់ត្រាផ្សេងៗ</label>
                <div class="col-sm-1" style="width:400px;">
                    <input type="text" name="Description" class="form-control">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label" style="width:160px;"></label>
                <div class="col-sm-5">
                    <button type="submit" id="save" class="btn btn-success">រក្សាទុក</button>
                    <a href="{{url('/view/income')}}" class="btn btn-danger">បោះបង់</a>
                </div>
            </div>
        </div>
    </div>
</form>
@endsection
@section('script')
<script src="{{url('/script/plugin/bootstrap/moment-with-locales.js')}}" charset="utf-8"></script>
<script src="{{url('/script/plugin/bootstrap/bootstrap-datetimepicker.js')}}" charset="utf-8"></script>
<script type="text/javascript">
    (function() {
        $('#incomedate').datetimepicker({
            format: 'YYYY-MM-DD',
            defaultDate: new Date()
        });
    })();
</script>
@endsection
