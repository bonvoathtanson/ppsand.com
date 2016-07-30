@extends('layouts.admin')
@section('css')
<link rel="stylesheet" href="{{url('/css/plugin/icheck/iCheck.css')}}" media="screen" title="no title" charset="utf-8">
<link rel="stylesheet" href="{{url('/css/plugin/datetimepicker/bootstrap-datetimepicker.min.css')}}" media="screen" title="no title" charset="utf-8">
@endsection
@section('content')
<div class="box-title">
  <i class="fa fa-plus-square" aria-hidden="true"></i> កំណត់ត្រាចំណាយកានាំចូល
</div>
<form id="formExpanse" class="form-horizontal" method="POST" onsubmit="return false;">
    {{ csrf_field() }}
    <input type="hidden" name="SupplierId" value="{{$supplier->Id}}">
    <input type="hidden" name="ExpanseType" value="1">
    <div class="panel panel-default">
        <div class="panel-body">
            <div class="form-group">
                <label class="col-sm-1 control-label" style="width:150px;">ឈ្មោះអ្នកផ្គត់ផ្គង់</label>
                <div class="col-sm-1" style="width:300px;">
                    <input type="text" class="form-control" disabled="disabled" value="{{$supplier->SupplierName}}">
                </div>
                <div class="col-sm-1" style="width:280px; padding-left:0;">
                    <a href="{{url('/view/selectcustomer')}}" class="btn btn-success">ជ្រើសរើសអ្នកផ្គត់ផ្គង់</a>
                    <a href="{{url('/create/supplier')}}" class="btn btn-primary">បន្ថែមអ្នកផ្គត់ផ្គង់</a>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-1 control-label" style="width:150px;">អាស័យដ្ឋាន</label>
                <div class="col-sm-1" style="width:560px;">
                    <input type="text" class="form-control" disabled="disabled" value="{{$supplier->Address}}">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-1 control-label" style="width:150px;">ចំណូលក្នុងថ្ងៃ</label>
                <div class="col-sm-1" style="width:200px;">
                    <input type="text" class="form-control" id="incomedate" name="ExpanseDate">
                </div>
            </div>
        </div>
    </div>

    <div class="">
        <table class="table table-bordered table-hover">
            <thead>
                <tr class="warning">
                    <th class="center"></th>
                    <th>មុខទំនិញ</th>
                    <th class="center">ថ្ងៃខែឆ្នាំលក់</th>
                    <th class="center">ចំនួន</th>
                    <th style="text-align:right;">ចំនួនទឹកប្រាក់</th>
                    <th style="text-align:right;">បង់ចំនួន</th>
                    <th style="text-align:right;">ប្រាក់នៅសល់</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($imports as $key => $value): ?>
                    <tr data-id="{{$value->Id}}">
                        <td class="center"><input type="checkbox" name="ImportIds[]" value="{{$value->Id}}"></td>
                        <td>{{$value->Item->ItemName}}</td>
                        <td class="center">{{date_format(date_create($value->ImportDate), 'Y-m-d')}}</td>
                        <td class="center">{{$value->Quantity}}</td>
                        <td style="text-align:right;">{{$value->SubTotal}}</td>
                        <td style="text-align:right;">{{$value->PayAmount}}</td>
                        <td style="text-align:right;">{{$value->SubTotal-$value->PayAmount}}</td>
                    </tr>
                <?php endforeach; ?>
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
                <a href="{{url('/')}}" class="btn btn-danger">បោះបង់</a>
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
                var item = $('#formExpanse').serialize();
                $.ajax({
                    type: 'POST',
                    url: burl + '/insert/expanse',
                    data: item
                }).done(function (data) {
                    console.log(data);
                    if (data.IsError == false) {
                        $('tr:has(:checkbox:checked)').remove();
                        $('#totalamount').text('0.00');
                        $('#formExpanse').bootstrapValidator('resetForm', true);
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
            var form = $('body').find('#formExpanse');
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
    })();
</script>
@endsection
