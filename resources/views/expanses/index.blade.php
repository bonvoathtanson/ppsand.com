@extends('layouts.admin')
@section('css')
<link rel="stylesheet" href="{{url('/css/plugin/datetimepicker/bootstrap-datetimepicker.min.css')}}" media="screen" title="no title" charset="utf-8">
@endsection
@section('content')
<div class="box-title">
  <i class="fa fa-list" aria-hidden="true"></i> តារាងចំណាយ
</div>
<div class="row memu-bar">
  <div class="col-sm-12">
    <div class="pull-right">
      <a href="{{url('/view/selsupplier')}}" class="btn btn-primary"><i class="fa fa-plus" aria-hidden="true"></i> ជ្រើសរើសអ្នកផ្គត់ផ្គង់</a>
          <a href="{{url('/create/otherexpanse')}}" class="btn btn-primary"><i class="fa fa-credit-card" aria-hidden="true"></i> ចំណាយផ្សេងៗ</a>
    </div>
  </div>
</div>
<form id="formSearchExpanse" method="post" onsubmit="return false;">
    {{ csrf_field() }}
    <div class="panel panel-default" style="width:100%;padding:5px">
        <div class="panel-body">
            <div class="form-group">
                <div class="col-sm-1" style="width:135px; padding-left:0px;">
                    <input type="text" id="expanseFromDate" name="expanseFromDate" class="form-control" placeholder="ចាប់ពីថ្ងៃ">
                </div>
                <div class="col-sm-1" style="width:25px;margin-top:5px; padding-left:0;">ដល់</div>
                <div class="col-sm-1" style="width:135px;">
                    <input type="text" id="expanseToDate" name="expanseToDate" class="form-control" placeholder="ដល់ថ្ងៃ">
                </div>
                <div class="col-sm-1" style="width:220px; padding-left:0;">
                    <button type="button" id="btnsearch" class="btn btn-success">ស្វែងរក</button>
                </div>
            </div>
        </div>
    </div>
</form>
<div class="row">
  <div class="col-sm-12">
    <table id="expanseTable" class="table table-bordered table-hover">
      <thead>
        <tr class="bg-white">
          <!-- <th>ឈ្មោះអ្នកផ្គត់ផ្គង់</th> -->
          <th>ថ្ងៃខែចំណាយ</th>
          <th>ប្រភេទចំណាយ</th>
          <th class="center">បរិយាយ</th>
          <th class="center">ចំនួនសរុប</th>
          <th style="width:40px;"></th>
        </tr>
      </thead>
      <tbody></tbody>
    </table>
  </div>
  <div class="box-null" style="font-size:14pt; color:red; padding-left:15px; display:none;">
      ទិន្នន័យស្វែងរកមិនមាន
  </div>
</div>
@endsection
@section('script')
<script src="{{url('/script/plugin/bootstrap/moment-with-locales.js')}}" charset="utf-8"></script>
<script src="{{url('/script/plugin/bootstrap/bootstrap-datetimepicker.js')}}" charset="utf-8"></script>
<script src="{{url('/script/expanses/expanse.index.js')}}" charset="utf-8"></script>
@endsection
