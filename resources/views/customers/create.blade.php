@extends('layouts.admin')
@section('content')
<div class="box-title">
    <i class="fa fa-plus-square" aria-hidden="true"></i> កែប្រែព័ត៍មានអតិថិជន់ថ្មី
</div>
<form id="formUser" class="form-horizontal" method="POST" onsubmit="return false;">
    {{ csrf_field() }}
    <div class="panel panel-default">
        <div class="panel-body">
            <div class="form-group">
                <label class="col-sm-1 control-label" style="width:150px;">លេខកូដ</label>
                <div class="col-sm-1" style="width:120px;">
                    <input type="text" name="Name" class="form-control">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-1 control-label" style="width:150px;">ឈ្មោះ</label>
                <div class="col-sm-1" style="width:300px;">
                    <input type="text" name="Name" class="form-control">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-1 control-label" style="width:150px;">ភេទ</label>
                <div class="col-sm-1" style="width:300px;">
                    <span>ប្រុស <input type="radio" name="Sex" value="1" checked="checked"/></span>
                    <span style="margin-left:15px;">ស្រី <input type="radio" name="Sex" value="2"/></span>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-1 control-label" style="width:150px;">លេខទូរស័ព្ទ</label>
                <div class="col-sm-1" style="width:300px;">
                    <input type="text" name="Name" class="form-control">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-1 control-label" style="width:150px;">អស័យដ្ឋាន</label>
                <div class="col-sm-1" style="width:450px;">
                    <input type="text" name="Name" class="form-control">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-1 control-label" style="width:150px;">គោលដៅអតិថិជន់</label>
                <div class="col-sm-2">
                    <select class="form-control" name="TypeId" style="font-size:10pt;">
                        <option value="0"></option>
                        <option value="1">សួរពត៍មាន</option>
                        <option value="2">បញ្ជាទិញ</option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-1 control-label" style="width:150px;"></label>
                <div class="col-sm-1" style="width:300px;">
                    <button type="submit" id="save" class="btn btn-success">រក្សាទុក</button>
                    <a href="{{url('/view/customer')}}" class="btn btn-danger">បោះបង់</a>
                </div>
            </div>
        </div>
    </div>
</form>
@endsection
