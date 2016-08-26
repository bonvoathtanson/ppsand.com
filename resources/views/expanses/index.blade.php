@extends('layouts.admin')
@section('content')
<div class="box-title">
  <i class="fa fa-list" aria-hidden="true"></i> តារាងចំណាយ
</div>
<div class="row memu-bar">
  <div class="col-sm-12">
    <div class="pull-right">
      <a href="{{url('/view/selsupplier')}}" class="btn btn-primary"><i class="fa fa-plus" aria-hidden="true"></i> ជ្រើសរើសអ្នកផ្គត់ផ្គង់</a>
    </div>
  </div>
</div>
<div class="row">
  <div class="col-sm-12">
    <table id="expanseTable" class="table table-bordered table-hover">
      <thead>
        <tr class="bg-whife">
          <th>ឈ្មោះអ្នកផ្គត់ផ្គង់</th>
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
</div>
@endsection
@section('script')
<script src="{{url('/script/plugin/bootstrap/moment-with-locales.js')}}" charset="utf-8"></script>
<script src="{{url('/script/expanses/expanse.index.js')}}" charset="utf-8"></script>
@endsection
