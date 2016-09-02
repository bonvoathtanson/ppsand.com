@extends('layouts.admin')
@section('content')
<div class="box-title">
  <i class="fa fa-list" aria-hidden="true"></i> តារាងការទិញចូល
</div>
<div class="row memu-bar">
  <div class="col-sm-12">
    <div class="pull-right">
      <a href="{{url('/view/selsupplier')}}" class="btn btn-primary"><i class="fa fa-plus" aria-hidden="true"></i> ជ្រើើសរើសអ្នកផ្គត់ផ្គង់</a>
    </div>
  </div>
</div>
<div class="row">
  <div class="col-sm-12">
    <table id="importTable" class="table table-bordered table-hover">
      <thead>
        <tr class="bg-white">
          <th>ឈ្មោះអ្នកផ្គត់ផ្គង់</th>
          <th>មុខទំនិញ</th>
          <th class="center">ថ្ងៃខែឆ្នាំ</th>
          <th>ចំនួន</th>
          <th>តំលៃលក់</th>
          <th style="text-align:right;">ទឹកប្រាក់សរុប</th>
          <th style="text-align:right;">បង់ចំនួន</th>
          <th style="text-align:right;">នៅសល់</th>
          <th class="center" style="width:30px;"></th>
        </tr>
      </thead>
      <tbody></tbody>
    </table>
  </div>
</div>
@endsection
@section('script')
<script src="{{url('/script/plugin/bootstrap/moment-with-locales.js')}}" charset="utf-8"></script>
<script src="{{url('/script/imports/import.index.js')}}" charset="utf-8"></script>
@endsection
