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
