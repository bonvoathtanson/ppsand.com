@extends('layouts.admin')
@section('css')
<link rel="stylesheet" href="{{url('/css/plugin/datetimepicker/bootstrap-datetimepicker.min.css')}}" media="screen" title="no title" charset="utf-8">
@endsection
@section('content')
<div class="box-title">
  <i class="fa fa-plus-square" aria-hidden="true"></i> កំណត់ត្រាកានាំចូលពីអ្នកផ្គត់ផ្គង់ឈ្មោះ [{{$supplier->SupplierName}}]
</div>
<form id="formImport" class="form-horizontal" onsubmit="return false;">
    {{ csrf_field() }}
    <input type="hidden" name="SupplierId" value="{{$supplier->Id}}">
    <div class="panel panel-default">
        <div class="panel-body">
            <div class="form-group">
                <label class="col-sm-1 control-label" style="width:150px;">ឈ្មោះអតិជិជន</label>
                <div class="col-sm-1" style="width:300px;">
                    <input type="text" class="form-control" disabled="disabled" value="{{$supplier->SupplierName}}">
                </div>
                <div class="col-sm-1" style="width:280px; padding-left:0;">
                    <a href="{{url('/view/selectcustomer')}}" class="btn btn-success">ជ្រើសរើសអ្នកផ្គត់ផ្គង់​</a>
                    <a href="{{url('/create/customer')}}" class="btn btn-primary">បន្ថែមអ្នកផ្គត់ផ្គង់ថ្មី</a>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-1 control-label" style="width:150px;">អាស័យដ្ឋាន</label>
                <div class="col-sm-1" style="width:580px;">
                    <input type="text" class="form-control" disabled="disabled" value="{{$supplier->Address}}">
                </div>
            </div>
        </div>
    </div>
    <div class="panel panel-default">
        <div class="panel-body">
            <div class="form-group">
                <label class="col-sm-1 control-label" style="width:150px;">មុខទំនិញ</label>
                <div class="col-sm-1" style="width:350px;">
                    <select class="form-control" name="ItemId" id="itemid">
                        <option value=""></option>
                        <?php foreach ($items as $index => $value): ?>
                            <option value="{{$value->Id}}" price="{{$value->SalePrice}}">{{$value->ItemName}}</option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-1 control-label" style="width:150px;">ថ្ងៃខែឆ្នាំបញ្ជាទិញ</label>
                <div class="col-sm-1" style="width:220px;">
                    <input type="text" id="importdate" name="ImportDate" class="form-control">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-1 control-label" style="width:150px;">ចំនួន</label>
                <div class="col-sm-1" style="width:150px;">
                    <input type="text" id="quantity" name="Quantity" class="form-control">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-1 control-label" style="width:150px;">តំលៃលក់ចេញ</label>
                <div class="col-sm-1" style="width:150px;">
                    <input type="text" id="saleprice" name="SalePrice" class="form-control">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-1 control-label" style="width:150px;">លេខឡាន</label>
                <div class="col-sm-1" style="width:200px;">
                    <input type="text" id="carnumber" name="CarNumber" class="form-control">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-1 control-label" style="width:150px;">ដឹកចូល</label>
                <div class="col-sm-1" style="width:200px;">
                    <select class="form-control" id="typeid" name="IsOrder">
                        <option value="0">ដឹកចូលភ្លាម</option>
                        <option value="1">ដឹកចូលពេលក្រោយ</option>
                    </select>
                </div>
            </div>
            <div id="group-date" class="form-group" style="display:none;">
                <label class="col-sm-1 control-label" style="width:150px;">ថ្ងៃខែឆ្នាំដឹកចូល</label>
                <div class="col-sm-1" style="width:350px;">
                    <input type="text" id="transferdate" name="TransferDate" class="form-control">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-1 control-label" style="width:150px;">ទឹកប្រាក់សរុប</label>
                <div class="col-sm-1" style="width:350px;">
                    <input type="text" id="totalamount" name="TotalAmount" class="form-control" disabled="disabled" value="0">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-1 control-label" style="width:150px;">បង់ប្រាក់ចំនួន</label>
                <div class="col-sm-1" style="width:350px;">
                    <input type="text" id="payamount" name="PayAmount" class="form-control" value="0">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-1 control-label" style="width:150px;"></label>
                <div class="col-sm-1" style="width:350px;">
                    <button type="submit" class="btn btn-success" id="save">រក្សាទុក</button>
                    <a href="{{url('/view/import')}}" class="btn btn-danger">បោះបង់</a>
                </div>
            </div>
        </div>
    </div>
</form>
@endsection
@section('script')
<script src="{{url('/script/plugin/bootstrap/moment-with-locales.js')}}" charset="utf-8"></script>
<script src="{{url('/script/plugin/bootstrap/bootstrap-datetimepicker.js')}}" charset="utf-8"></script>
<script src="{{url('/script/imports/import.add.js')}}" charset="utf-8"></script>
@endsection
