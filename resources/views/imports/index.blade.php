@extends('layouts.admin')
@section('content')
<div class="box-title">
  <i class="fa fa-list" aria-hidden="true"></i> តារាងការទិញចូល
</div>
<div class="row memu-bar">
  <div class="col-sm-12">
    <div class="pull-right">
      <a href="{{url('/create/import')}}" class="btn btn-primary"><i class="fa fa-plus" aria-hidden="true"></i> បន្ថែម</a>
    </div>
  </div>
</div>
<div class="row">
  <div class="col-sm-12">
    <table class="table table-bordered table-hover">
      <thead>
        <tr class="warning">
          <th>ឈ្មោះអ្នកផ្គត់ផ្គង់</th>
          <th>លេខកូដទិញចូល</th>
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
