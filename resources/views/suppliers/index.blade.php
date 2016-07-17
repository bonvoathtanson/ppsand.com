@extends('layouts.admin')
@section('content')
<div class="box-title">
  <i class="fa fa-list" aria-hidden="true"></i> បញ្ចីរាយនាមអ្នកផ្គត់ផ្គង់
</div>
<div class="row memu-bar">
  <div class="col-sm-12">
    <div class="pull-right">
      <a href="{{url('/create/supplier')}}" class="btn btn-primary"><i class="fa fa-plus" aria-hidden="true"></i> បន្ថែម</a>
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
          <th>ឈ្មោះអ្នកផ្គត់ផ្គង់</th>
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
