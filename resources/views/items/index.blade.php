@extends('layouts.admin')
@section('content')
<div class="box-title">
  តារាងមុខទំនិញ
</div>
<div class="row memu-bar">
  <div class="col-sm-12">
    <div class="pull-right">
      <button type="button" class="btn btn-primary">បន្ថែម</button>
    </div>
  </div>
</div>
<div class="row">
  <div class="col-sm-12">
    <table class="table table-bordered table-hover">
      <thead>
        <tr class="active">
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
