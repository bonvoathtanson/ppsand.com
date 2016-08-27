@extends('layouts.admin')
@section('css')
<link rel="stylesheet" href="{{url('/css/plugin/icheck/iCheck.css')}}" media="screen" title="no title" charset="utf-8">
<link rel="stylesheet" href="{{url('/css/plugin/datetimepicker/bootstrap-datetimepicker.min.css')}}" media="screen" title="no title" charset="utf-8">
@endsection
@section('content')
<div class="box-title">
  <i class="fa fa-plus-square" aria-hidden="true"></i> កំណត់ត្រាចំណូល
</div>
<form id="formIncome" class="form-horizontal" method="POST" onsubmit="return false;">
    {{ csrf_field() }}
    <input type="hidden" name="CustomerId" value="">
    <input type="hidden" name="IncomeType" value="1">
    <div class="panel panel-default">
        <div class="panel-body">
            <div class="form-group">
                <label class="col-sm-1 control-label" style="width:150px;">ឈ្មោះអតិជិជន</label>
                <div class="col-sm-1" style="width:300px;">
                    <input type="text" class="form-control" disabled="disabled">
                </div>
                <div class="col-sm-1" style="width:280px; padding-left:0;">
                    <a href="javascript:void(0)" class="btn btn-success customer">ជ្រើសរើសអតិថិជន</a>
                    <a href="{{url('/create/customer')}}" class="btn btn-primary">បន្ថែមអតិថិជនថ្មី</a>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-1 control-label" style="width:150px;">អាស័យដ្ឋាន</label>
                <div class="col-sm-1" style="width:560px;">
                    <input type="text" class="form-control" disabled="disabled">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-1 control-label" style="width:150px;">ចំណូលក្នុងថ្ងៃ</label>
                <div class="col-sm-1" style="width:200px;">
                    <input type="text" class="form-control" id="incomedate" name="IncomeDate">
                </div>
            </div>
        </div>
    </div>

    <div class="">
        <table class="table table-bordered table-hover">
            <thead>
                <tr class="bg-whife">
                    <th class="center"></th>
                    <th>មុខទំនិញ</th>
                    <th class="center">ថ្ងៃខែឆ្នាំលក់</th>
                    <th class="center">ចំនួន</th>
                    <th class="center">ចំនួនទឹកប្រាក់</th>
                    <th class="center">បង់ចំនួន</th>
                    <th class="center">ប្រាក់នៅសល់</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="6" style="text-align:right;">ចំនួនទឹកប្រាក់សរុប</td>
                    <td style="text-align:right;">
                        <span id="totalamount" style="color:blue; font-weight:bold;">0.00</span>
                    </td>
                </tr>
            </tfoot>
        </table>
    </div>

    <div class="form-group" style="margin-bottom:50px;">
        <div class="col-sm-12">
            <div class="pull-right">
                <button type="submit" id="save" class="btn btn-success">រក្សាទុក</button>
            </div>
        </div>
    </div>
</form>
<form id="formCustomer" class="form-horizontal" onsubmit="return false;">
    {{ csrf_field() }}
    <div id="myModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="gridSystemModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <span id="itemname" style="color:#0856ab; font-weight:bold;">ស្វែងរកឈ្មោះអតិថិជន</span>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body" style="min-height:350px;">
                    <table style="width:250px; margin-bottom:5px;">
                        <tbody>
                            <tr>
                                <td>
                                    <input type="text" id="customerNameSearch" name="customerNameSearch" class="form-control"​ placeholder="ស្វែករកតាម លេខកូដ ឈ្មោះ លេខទូស័ព្ទ">
                                </td>
                                <td class="center" style="width:20px; padding-left:10px;">
                                    <button type="button" id="btnSearchNameCustomer" class="btn btn-success">ស្វែងរក</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
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
                    <div class="box-null-customer center" style="font-size:11pt; color:red; display:none;">
                        <div class="form-group">
                            <label class="col-sm-1 control-label" style="width:180px;​padding-left:0px">ទិន្នន័យស្វែ​ងរកមិនមាន</label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
@endsection
@section('script')
<script src="{{url('/script/plugin/icheck/icheck.js')}}" charset="utf-8"></script>
<script src="{{url('/script/plugin/bootstrap/moment-with-locales.js')}}" charset="utf-8"></script>
<script src="{{url('/script/plugin/bootstrap/bootstrap-datetimepicker.js')}}" charset="utf-8"></script>
<script type="text/javascript">
    (function() {

        $('#incomedate').datetimepicker({
            format: 'YYYY-MM-DD',
            defaultDate: new Date()
        });

        $(':checkbox').iCheck({
            checkboxClass: 'icheckbox_minimal'
        });

        $('input').on('ifChecked', function(event){
            var select = $(this).closest('tr');
            var total = parseInt($(select).find('td:eq(6)').text()) + parseInt($('#totalamount').text());
            $('#totalamount').text(total);
        });

        $('input').on('ifUnchecked', function(event){
            var select = $(this).closest('tr');
            var total = parseInt($('#totalamount').text()) - parseInt($(select).find('td:eq(6)').text());
            $('#totalamount').text(total);
        });

        SetValidation();
        function SaveOrUpdate() {
            var checkeds = $(':checkbox:checked');
            if(checkeds.length > 0){
                $('body').append(Loading());
                var item = $('#formIncome').serialize();
                $.ajax({
                    type: 'POST',
                    url: burl + '/insert/income',
                    data: item
                }).done(function (data) {
                    if (data.IsError == false) {
                        $('tr:has(:checkbox:checked)').remove();
                        $('#formIncome').bootstrapValidator('resetForm', true);
                    } else {
                        swal(data.Message, '', 'success');
                    }
                }).complete(function (data) {
                    $('body').find('.loading').remove();
                });
            }else{
                swal('សូមជ្រើសរើសទំនិញ ដែលត្រូវបង់', '', 'warning');
            }
        }
        function SetValidation() {
            var form = $('body').find('#formIncome');
            form.bootstrapValidator({
                feedbackIcons: {
                    valid: 'glyphicon glyphicon-ok',
                    invalid: 'glyphicon glyphicon-remove',
                    validating: 'glyphicon glyphicon-refresh'
                },
                fields: {
                    IncomeDate: {
                        validators: {
                            notEmpty: {
                                message: 'ថ្ងៃខែឆ្មាំ តំរូវអោយបញ្ចូល'
                            },
                            date: {
                                format: 'YYYY-MM-DD',
                                message: 'ទំរង់ថ្ងៃខែឆ្មាំមិនត្រឹមត្រូវ'
                            }
                        }
                    }
                }
            }).on('success.form.bv', function (e) {
                SaveOrUpdate();
            });
        }

        //----------Select customer---------
        $('body').on('click', '.customer', function(){
            $('#myModal').modal({
                backdrop: false
            });
        });
        $('#myModal').on('shown.bs.modal', function (e) {
            $('#customerNameSearch').focus();
        });

        $('#myModal').on('hidden.bs.modal', function (e) {
            $('#customerNameSearch').val('');
        });

        $('body').on('click','.selected',function(){
            // var customerName = $(this).attr('data-name');
            // var customerId   = $(this).attr('data-id');
            // var carNumber   = $('#hdfcarNumber').val();
            // $('#customerName').val(customerName);
            // $('#hdfcustomerId').val(customerId);
            $('#myModal').modal('hide');
        });

        $('body').on('click', '#btnSearchNameCustomer', function(){
            var value = $('#customerNameSearch').val();
            if(value != '' && value != null){
                Search();
            }else{
                $('.box-null-customer').show();
                $('.box-table').hide();
                $('#customerTable tbody tr').remove();
            }
        });
        $('body').on('keypress', '#customerNameSearch', function(event){
            if(event.which == 13) {
                var value = $('#customerNameSearch').val();
                if(value != '' && value != null){
                    Search();
                }else{
                    $('.box-null-customer').show();
                    $('.box-table').hide();
                    $('#customerTable tbody tr').remove();
                }
            }
        });

        function Search(){
            GetItems(function(customers){
                RenderTable(customers, function(element){
                    if(element != '' && element != null)
                    {
                        $('.box-null-customer').hide();
                        $('.box-table').show();
                    }else{
                        $('.box-null-customer').show();
                        $('.box-table').hide();
                    }
                    $('#customerTable tbody').html(element);
                });
            });
        }
        function GetItems(callback) {
            $('body').append(Loading());
            var requestUrl = burl + '/filter/customer/' + $('#customerNameSearch').val();
            $.ajax({
                url: requestUrl,
                type: 'GET',
                dataType: 'JSON',
                contentType: 'application/json; charset=utf-8',
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

        function RenderTable(customers, callback){
            var element = '';
            if((customers != null) && (customers.length > 0)){
                $.each(customers, function(index, item){
                    var sex = 'ប្រុស';
                    if(item.Sex == 2){
                        sex = 'ស្រី';
                    }
                    element += '<tr>' +
                    '<td>' + item.CustomerCode + '</td>' +
                    '<td>' + item.CustomerName + '</td>' +
                    '<td class="center">' + item.PhoneNumber + '</td>' +
                    '<td class="center">' +
                    '<a data-id="' + item.Id + '" data-name="' + item.CustomerName + '" href="javascript:void(0)" class="btn btn-info btn-e selected">ជ្រើសរើស</a> ' +
                    '</td>'
                    '</tr>';
                });
            }
            if(typeof callback == 'function'){
                callback(element);
            }
        }
    })();
</script>
@endsection
