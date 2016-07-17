@extends('layouts.admin')
@section('content')
<div class="box-title">
  <i class="fa fa-list" aria-hidden="true"></i> តារាងឈ្មោះគណនេយ្យអ្្នកប្រើប្រាស់
</div>
<div class="row memu-bar">
  <div class="col-sm-12">
    <div class="pull-right">
      <a href="{{url('/create/user')}}" class="btn btn-primary"><i class="fa fa-plus" aria-hidden="true"></i> បន្ថែម</a>
    </div>
  </div>
</div>
<div class="row">
  <div class="col-sm-12">
    <table class="table table-bordered table-hover">
      <thead>
        <tr class="warning">
          <th class="center" style="width:100px;">ល.រ</th>
          <th>ឈ្មោះគណនេយ្យ</th>
          <th>ថ្ងៃបង្កើត</th>
          <th class="center" style="width:120px;">សកម្មភាព</th>
        </tr>
      </thead>
    </table>
  </div>
</div>
@endsection
