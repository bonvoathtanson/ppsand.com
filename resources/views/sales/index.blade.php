@extends('layouts.admin')
@section('content')
<div class="box-title">
  <i class="fa fa-list" aria-hidden="true"></i>​​ តារាងការលក់ចេញ
</div>
<div class="row memu-bar">
  <div class="col-sm-12">
    <div class="pull-right">
      <a href="{{url('/view/selectcustomer')}}" class="btn btn-primary"><i class="fa fa-plus" aria-hidden="true"></i> ជ្រើសរើសអតិថិជន់</a>
    </div>
  </div>
</div>
<div class="row">
  <div class="col-sm-12">
    <table class="table table-bordered table-hover">
      <thead>
        <tr class="warning">
          <th>ឈ្មោះអតិថិជន់</th>
          <th>លេខកូដលក់</th>
          <th>ថ្ងៃខែឆ្នាំលក់</th>
          <th>លេខឡាន</th>
          <th>ចំនួន</th>
          <th>តំលៃលក់</th>
          <th>ទឹកប្រាក់សរុប</th>
          <th class="center" style="width:120px;">សកម្មភាព</th>
        </tr>
      </thead>
    </table>
  </div>
</div>
@endsection
