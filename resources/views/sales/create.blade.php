@extends('layouts.admin')
@section('css')
    <link rel="stylesheet" href="{{url('/css/plugin/datetimepicker/bootstrap-datetimepicker.min.css')}}" media="screen" title="no title" charset="utf-8">
@endsection
@section('content')
<div class="box-title">
    <i class="fa fa-plus-square" aria-hidden="true"></i> កំណត់ត្រាកាលក់របស់អតិថិជន [{{$customer->CustomerName}}]
</div>
<form class="form-horizontal" onsubmit="return false;">
    {{ csrf_field() }}
    <input type="hidden" name="CustomerId" value="{{$customer->Id}}">
    <div class="panel panel-default">
        <div class="panel-body">
            <div class="form-group">
                <label class="col-sm-1 control-label" style="width:150px;">ឈ្មោះអតិជិជន</label>
                <div class="col-sm-1" style="width:300px;">
                    <input type="text" class="form-control" disabled="disabled" value="{{$customer->CustomerName}}">
                </div>
                <div class="col-sm-1" style="width:280px; padding-left:0;">
                    <a href="{{url('/view/selectcustomer')}}" class="btn btn-success">ជ្រើសរើសអតិថិជន</a>
                    <a href="{{url('/create/customer')}}" class="btn btn-primary">បន្ថែមអតិថិជនថ្មី</a>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-1 control-label" style="width:150px;">អាស័យដ្ឋាន</label>
                <div class="col-sm-1" style="width:560px;">
                    <input type="text" class="form-control" disabled="disabled" value="{{$customer->Address}}">
                </div>
            </div>
        </div>
    </div>
    <div>
        <div class="form-group">
            <div class="col-sm-1" style="width:200px;">
                <input type="text" id="itemcode" class="form-control" placeholder="លេខកូដ">
            </div>
        </div>
    </div>
    <div>
        <table class="table table-bordered table-hover">
          <thead>
            <tr class="warning">
              <th>លេខកូដលក់</th>
              <th>ថ្ងៃខែឆ្នាំលក់</th>
              <th>លេខឡាន</th>
              <th>ចំនួន</th>
              <th>តំលៃលក់</th>
              <th style="text-align:right;">ទឹកប្រាក់សរុប</th>
            </tr>
          </thead>
        </table>
    </div>
    <div id="myModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="gridSystemModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <input type="hidden" id="itemid" name="ItemId">
                    <span id="itemname" style="color:#0856ab; font-weight:bold;">ឈ្មោះមុខទំនិញ</span>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label class="col-sm-1 control-label" style="width:150px;">ថ្ងៃខែឆ្នាំលក់</label>
                        <div class="col-sm-1" style="width:350px;">
                            <input type="text" id="saledate" name="SaleDate" class="form-control">
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
                        <label class="col-sm-1 control-label" style="width:150px;">ដឹកចេញ</label>
                        <div class="col-sm-1" style="width:200px;">
                            <select class="form-control" id="typeid" name="TypeId">
                                <option value="1">ដឹកចេញភ្លាម</option>
                                <option value="2">ដឹកចេញពេលក្រោយ</option>
                            </select>
                        </div>
                    </div>
                    <div id="group-date" class="form-group" style="display:none;">
                        <label class="col-sm-1 control-label" style="width:150px;">ថ្ងៃខែឆ្នាំដឹកអោយ</label>
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
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">បិទ</button>
                    <button type="button" class="btn btn-primary">រក្សាទុក</button>
                </div>
            </div>
        </div>
    </div>
</form>
@endsection
@section('script')
<script src="{{url('/script/plugin/bootstrap/moment-with-locales.js')}}" charset="utf-8"></script>
<script src="{{url('/script/plugin/bootstrap/bootstrap-datetimepicker.js')}}" charset="utf-8"></script>
<script src="{{url('/script/sales/sale.add.js')}}" charset="utf-8"></script>
@endsection
