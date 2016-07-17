@extends('layouts.admin')
@section('content')
<div class="box-title">
  <i class="fa fa-list" aria-hidden="true"></i> តារាងមុខទំនិញ
</div>
<div class="row memu-bar">
  <div class="col-sm-12">
    <div class="pull-right">
      <a href="{{url('/create/item')}}" class="btn btn-primary"><i class="fa fa-plus" aria-hidden="true"></i> បន្ថែម</a>
    </div>
  </div>
</div>
<div class="row">
  <div class="col-sm-12">
    <table class="table table-bordered table-hover">
      <thead>
        <tr class="warning">
          <th>ល.រ</th>
          <th>លេខកូដ</th>
          <th>ឈ្មោះទំនិញ</th>
          <th>តំលៃលក់</th>
          <th>ចំនួនក្នុងស្តុក</th>
          <th>សកម្មភាព</th>
        </tr>
      </thead>
    </table>
  </div>
</div>
@endsection
