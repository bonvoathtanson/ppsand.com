@extends('layouts.admin')
@section('content')
<div class="box-title">
  <i class="fa fa-plus-square" aria-hidden="true"></i> បន្ថែមមុខទំនិញថ្មី
</div>
<form class="form-horizontal" action="index.html" method="post">
  <div class="box-form">
    <div class="form-group">
      <label class="col-sm-2 control-label">ឈ្មោះមុខទំនិញ</label>
      <div class="col-sm-5">
        <input type="email" class="form-control" id="inputEmail3">
      </div>
    </div>
    <div class="form-group">
      <label class="col-sm-2 control-label">លេខកូដទំនិញ</label>
      <div class="col-sm-2">
        <input type="email" class="form-control" id="inputEmail3">
      </div>
    </div>
    <div class="form-group">
      <label class="col-sm-2 control-label">តំលៃលក់ចេញ</label>
      <div class="col-sm-2">
        <input type="email" class="form-control" id="inputEmail3">
      </div>
    </div>
    <div class="form-group">
      <label class="col-sm-2 control-label">ចំនួនក្នុងស្តុក</label>
      <div class="col-sm-2">
        <input type="email" class="form-control" id="inputEmail3">
      </div>
    </div>
    <div class="form-group">
      <label class="col-sm-2 control-label"></label>
      <div class="col-sm-5">
        <button type="button" name="button" class="btn btn-success">រក្សាទុក</button>
        <a href="{{url('/view/item')}}" class="btn btn-danger">បោះបង់</a>
      </div>
    </div>
  </div>
</form>
@endsection
