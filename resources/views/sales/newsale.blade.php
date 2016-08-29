@extends('layouts.admin')
@section('css')
<link rel="stylesheet" href="{{url('/css/plugin/datetimepicker/bootstrap-datetimepicker.min.css')}}" media="screen" title="no title" charset="utf-8">
@endsection
@section('content')
<div class="box-title">
  <i class="fa fa-plus-square" aria-hidden="true"></i> កំណត់ត្រាការលក់របស់អតិថិជន
</div>
<form id="formImport" class="form-horizontal" onsubmit="return false;">
    {{ csrf_field() }}
    <input type="hidden" id="CustomerId" name="CustomerId" value="">
    <div class="panel panel-default">
        <div class="panel-body">
            <div class="form-group">
                <label class="col-sm-1 control-label" style="width:150px;">ឈ្មោះអតិជិជន</label>
                <div class="col-sm-1" style="width:300px;">
                    <input type="text" id="customername" name="customername" class="form-control" disabled="disabled" value="">
                </div>
                <div class="col-sm-1" style="width:280px; padding-left:0;">
                    <a href="javascript:void(0);" class="btn btn-success customer">ជ្រើសរើសអតិថិជន</a>
                    <a href="{{url('/create/customer')}}" class="btn btn-primary">បន្ថែមអតិថិជនថ្មី</a>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-1 control-label" style="width:150px;">អាស័យដ្ឋាន</label>
                <div class="col-sm-1" style="width:560px;">
                    <input type="text" id="address" name="address" class="form-control" disabled="disabled" value="">
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
                    <input type="text" id="saleDate" name="saleDate" class="form-control">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-1 control-label" style="width:150px;">ចំនួន</label>
                <div class="col-sm-1" style="width:150px;">
                    <input type="text" id="quantity" name="Quantity" class="form-control">
                </div>
                <div class="col-sm-1" style="width:150px; padding-left:0;">
                     <label class="control-label">ចំនួនក្នុងស្តុក <span id="viewqty" style="color:blue;">0</span></label>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-1 control-label" style="width:150px;">តំលៃលក់ចេញ</label>
                <div class="col-sm-1" style="width:150px;">
                    <input type="text" id="saleprice" name="SalePrice" class="form-control">
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

<form id="formCustomer" class="form-horizontal" onsubmit="return false;">
    {{ csrf_field() }}
    <div id="SearchModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="gridSystemModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <span id="itemname" style="color:#0856ab; font-weight:bold;">ស្វែងរកឈ្មោះអតិថិជន</span>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body" style="min-height:350px;">
                    <div style="margin-bottom:3px;">
                        <div class="input-group">
                            <input type="text" name="FilterText" class="form-control" placeholder="ស្វែករកតាម លេខកូដ ឈ្មោះ លេខទូស័ព្ទ">
                            <span class="input-group-btn">
                                <button class="btn btn-success" id="btnSearch" style="border:1px solid #419641;" type="button">ស្វែងរក</button>
                            </span>
                        </div>
                    </div>
                    <div class="box-table">
                        <table id="customerTable" class="table table-bordered table-hovered">
                            <thead>
                                <tr class="bg-whife">
                                    <th>លេខកូដ</th>
                                    <th>ឈ្មោះ</th>
                                    <th class="center">លេខទូរស័ព្ទ</th>
                                    <th style="width:90px;"></th>
                                </tr>
                            </thead>
                            <tbody></tbody>
                        </table>
                    </div>
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
<script type="text/javascript">

        ////////// Start section search customer//////////////

        $('body').on('click', '.customer', function(){
            $('#SearchModal').modal({
                backdrop: 'static'
            });
        });

        $('#SearchModal').on('shown.bs.modal', function (e) {
            $('#customer').focus();
        });

        $('#SearchModal').on('hidden.bs.modal', function (e) {
            $('#customer').val('');
        });

        $('body').on('click', '#btnSearch', function(){
            Search();
        });
        $('body').on('keypress', '[name="FilterText"]', function(event){
            if(event.which == 13) {
                Search();
            }
        });

        $('body').on('click','.selected',function(){
            var customerId = $(this).closest('tr').attr('data-id');
            GetSaleByCustomerId(customerId);
            $('#SearchModal').modal('hide');
        });

            function GetSaleByCustomerId(customerId) {
                $('body').append(Loading());
                var requestUrl = burl + '/ajax/sale/customer/' + customerId;
                $.ajax({
                    url: requestUrl,
                    type: 'GET',
                    dataType: 'JSON',
                    contentType: 'application/json; charset=utf-8',
                }).done(function (data) {
                    if(data.IsError == false){
                        var customer = data.Data.customer;
                        $('#customername').val(customer.CustomerName);
                        //$('[name="CustomerId"]').val(customerId);
                          $('#CustomerId').val(customerId);
                        $('#address').val(customer.Address);
                    }
                }).complete(function (data) {
                    $('body').find('.loading').remove();
                });
            }

        function Search(){
            var keyword = $('[name="FilterText"]').val();
            GetCustomer(keyword, function(customers){
                CustomerTable(customers, function(element){
                    $('#customerTable tbody').html(element);
                });
            });
        }

        function GetCustomer(keyword, callback) {
            $('body').append(Loading());
            var requestUrl = burl + '/filter/customer/' + keyword;
            $.ajax({
                url: requestUrl,
                type: 'GET',
                dataType: 'JSON',
                contentType: 'application/json; charset=utf-8'
            }).done(function (data) {
                if(data.IsError == false){
                    if(typeof callback == 'function'){
                        callback(data.Data);
                    }
                }
            }).complete(function (data) {
                $('body').find('.loading').remove();
            });
        }

        function CustomerTable(customers, callback){
            var element = '';
            if((customers != null) && (customers.length > 0)){
                $.each(customers, function(index, item){
                    element += '<tr data-id="' + item.Id + '">' +
                    '<td>' + item.CustomerCode + '</td>' +
                    '<td>' + item.CustomerName + '</td>' +
                    '<td class="center">' + item.PhoneNumber + '</td>' +
                    '<td class="center">' +
                    '<button type="button" class="btn btn-info btn-e selected">ជ្រើសរើស</button> ' +
                    '</td>'
                    '</tr>';
                });
            }
            if(typeof callback == 'function'){
                callback(element);
            }
        }

////////////////////End section customer search////////////////////////

</script>
@endsection
