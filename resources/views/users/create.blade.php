@extends('layouts.admin')
@section('content')
<div class="box-title" style="margin-bottom:25px;">
    <i class="fa fa-plus-square" aria-hidden="true"></i> បន្ថែមគណនីអ្្នកប្រើប្រាស់
</div>
<form id="formUser" class="form-horizontal" method="POST" onsubmit="return false;">
    {{ csrf_field() }}
    <div class="row">
        <div class="col-sm-12">
            <div class="form-group">
                <label class="col-sm-2 control-label">ឈ្មោះគណនី</label>
                <div class="col-sm-5">
                    <input type="text" name="Name" class="form-control" placeholder="ឈ្មោះគណនេយ្យ">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">អ៊ីម៉ែល</label>
                <div class="col-sm-5">
                    <input type="email" name="Email" class="form-control" placeholder="អ៊ីម៉ែល">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">លេខសំងាត់</label>
                <div class="col-sm-5">
                    <input type="password" name="Password" class="form-control" placeholder="លេខសំងាត់">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">បញ្ចាក់លេខសំងាត់</label>
                <div class="col-sm-5">
                    <input type="password" name="Verify" class="form-control" placeholder="បញ្ចាក់លេខសំងាត់">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label"></label>
                <div class="col-sm-5">
                    <button id="submit" type="submit" name="button" class="btn btn-success">បង្កើត</button>
                    <a href="{{url('/view/user')}}" class="btn btn-danger">បោះបង់</a>
                </div>
            </div>
        </div>
    </div>
</form>
@endsection
@section('script')
<script src="{{url('/script/users/user.add.js')}}" charset="utf-8"></script>
@endsection
