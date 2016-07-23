@extends('layouts.admin')
@section('content')
<div class="box-title">
  <i class="fa fa-list" aria-hidden="true"></i>​​ តារាងការលក់ចេញ
</div>
<div class="row memu-bar">
  <div class="col-sm-12">
    <div class="pull-right">
      <a href="{{url('/view/selectcustomer')}}" class="btn btn-primary"><i class="fa fa-plus" aria-hidden="true"></i> ជ្រើសរើសអតិថិជន</a>
    </div>
  </div>
</div>
<div class="row">
  <div class="col-sm-12">
    <table id="saleTable" class="table table-bordered table-hover">
      <thead>
        <tr class="warning">
          <th>ឈ្មោះអតិថិជន</th>
          <th>មុខទំនិញ</th>
          <th>ថ្ងៃខែឆ្នាំលក់</th>
          <th>លេខឡាន</th>
          <th>ចំនួន</th>
          <th>តំលៃលក់</th>
          <th style="text-align:right;">ទឹកប្រាក់សរុប</th>
          <th class="center" style="width:80px;"></th>
        </tr>
      </thead>
      <tbody></tbody>
    </table>
  </div>
</div>
@endsection
@section('script')
<script src="{{url('/script/plugin/bootstrap/moment-with-locales.js')}}" charset="utf-8"></script>
<script src="{{url('/script/sales/sale.index.js')}}" charset="utf-8"></script>
@endsection
