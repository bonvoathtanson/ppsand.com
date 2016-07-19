@extends('layouts.admin')
@section('content')
<div class="box-title">
  <i class="fa fa-plus-square" aria-hidden="true"></i> បញ្ចូលព័ត៍មានអតិថិជន់ថ្មី
</div>
<form id="formUser" class="form-horizontal" method="POST" onsubmit="return false;">
    {{ csrf_field() }}
    <div class="panel panel-default">
        <div class="panel-body">
            <div class="form-group">
                <label class="col-sm-1 control-label">លេខកូដ</label>
                <div class="col-sm-1">
                    <input type="text" name="Name" class="form-control">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-1 control-label">ឈ្មោះ</label>
                <div class="col-sm-3">
                    <input type="text" name="Name" class="form-control">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-1 control-label">ភេទ</label>
                <div class="col-sm-3">
                    <span>ប្រុស <input type="radio" name="Sex" value="1" checked="checked"/></span>
                    <span>ស្រី <input type="radio" name="Sex" value="2"/></span>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-1 control-label">លេខទូរស័ព្ទ</label>
                <div class="col-sm-3">
                    <input type="text" name="Name" class="form-control">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-1 control-label">អស័យដ្ឋាន</label>
                <div class="col-sm-5">
                    <input type="text" name="Name" class="form-control">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-1 control-label">ប្រភេទ</label>
                <div class="col-sm-2">
                    <select class="form-control" name="">
                        <option value="0"></option>
                        <option value="0">សួរពត៍មាន</option>
                        <option value="0">បញ្ជាទិញ</option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-1 control-label"></label>
                <div class="col-sm-5">
                    <button type="submit" id="save" class="btn btn-success">រក្សាទុក</button>
                    <a href="{{url('/view/customer')}}" class="btn btn-danger">បោះបង់</a>
                </div>
            </div>
        </div>
    </div>
</form>
@endsection
