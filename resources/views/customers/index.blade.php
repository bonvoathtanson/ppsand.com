@extends('layouts.admin')
@section('content')
<div class="box-title">
  បញ្ចីរាយនាមអតិថិជន់
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
          <th>ល.រ</th>
          <th>លេខកូដ</th>
          <th>ឈ្មោះអតិថិជន់</th>
          <th>ប្រភេទ</th>
          <th>ភេទ</th>
          <th>លេខទូរស័ព្ទ</th>
          <th>អស័យដ្ឋាន</th>
          <th class="center" style="width:120px;">សកម្មភាព</th>
        </tr>
      </thead>
    </table>
  </div>
</div>
@endsection
