@extends('layouts.admin')
@section('content')
<div class="box-title" style="margin-bottom:25px;">
  <i class="fa fa-plus-square" aria-hidden="true"></i> បន្ថែមគណនេយ្យអ្្នកប្រើប្រាស់
</div>
<form class="form-horizontal" action="index.html" method="post">
  <div class="row">
    <div class="col-sm-12">
      <div class="form-group">
        <label class="col-sm-2 control-label">ឈ្មោះគណនេយ្យ</label>
        <div class="col-sm-5">
          <input type="email" class="form-control" id="inputEmail3" placeholder="ឈ្មោះគណនេយ្យ">
        </div>
      </div>
      <div class="form-group">
        <label class="col-sm-2 control-label">លេខសំងាត់</label>
        <div class="col-sm-5">
          <input type="password" class="form-control" id="inputpassword" placeholder="លេខសំងាត់">
        </div>
      </div>
      <div class="form-group">
        <label class="col-sm-2 control-label">បញ្ចាក់លេខសំងាត់</label>
        <div class="col-sm-5">
          <input type="password" class="form-control" id="inputverify" placeholder="បញ្ចាក់លេខសំងាត់">
        </div>
      </div>
      <div class="form-group">
        <label class="col-sm-2 control-label"></label>
        <div class="col-sm-5">
          <button type="button" name="button" class="btn btn-success">បង្កើត</button>
          <a href="{{url('/view/user')}}" class="btn btn-danger">បោះបង់</a>
        </div>
      </div>
    </div>
  </div>
</form>
@endsection
