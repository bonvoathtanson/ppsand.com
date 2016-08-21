@extends('layouts.admin')
@section('css')
<link rel="stylesheet" href="{{url('/css/plugin/datetimepicker/bootstrap-datetimepicker.min.css')}}" media="screen" title="no title" charset="utf-8">
@endsection
@section('content')
<div class="box-title">
    <i class="fa fa-list" aria-hidden="true"></i>​​ តារាងទំនិញដែលត្រូវដឹកចេញ
</div>
<div class="row memu-bar">
    <div class="col-sm-12">
        <div class="pull-right">

        </div>
    </div>
</div>
<div class="row">
    <div class="col-sm-12">
        <table id="saleTable" class="table table-bordered table-hover">
            <thead>
                <tr class="warning">
                    <th>ឈ្មោះអតិថិជន</th>
                    <th>មុខទំនិញ</th>
                    <th class="center">ថ្ងៃខែឆ្នាំលក់</th>
                    <th class="center">ថ្ងៃខែឆ្មាំដឹកចេញ</th>
                    <th class="center">ចំនួន</th>
                    <th style="width:80px;"></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($sales as $index => $sale): ?>
                    <tr data-id="{{$sale->Id}}">
                        <td>{{$sale->Customer->CustomerName}}</td>
                        <td>{{$sale->Item->ItemName}}</td>
                        <td class="center">{{$sale->SaleDate}}</td>
                        <td class="center" style="color:#0856ab;">{{date_format(date_create($sale->TransferDate),'Y-m-d ម៉ោង H:i')}}</td>
                        <td class="center">{{$sale->Quantity}}</td>
                        <td class="center">
                            <button type="button" class="btn btn-danger btn-e transfer">ដឹកចេញ</button>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
<div class="modal fade" tabindex="-1" role="dialog" id="transfermodal">
    <form id="formTransfer" onsubmit="return false;">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <input type="hidden" name="Id">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title font-M1">កំណត់ត្រាដឹកជូនអតិថិជន</h4>
                </div>
                <div class="modal-body">
                    <table class="table table-bordered">
                        <tbody>
                            <tr>
                                <th style="width:150px; background:#f2f2f2; vertical-align:middle;">លេខឡាន</th>
                                <td>
                                    <div class="form-group" style="margin-bottom:0;">
                                        <select class="form-control" name="CarNumber">
                                            <option value="">ជ្រើសលេខឡាន</option>
                                            <?php foreach ($cars as $key => $value): ?>
                                                <option value="{{$value->CarNo}}">{{$value->CarNo}}</option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <th style="width:150px; background:#f2f2f2; vertical-align:middle;">ថ្ងៃខែឆ្នាំដឹកចេញ</th>
                                <td>
                                    <div class="form-group" style="margin-bottom:0;">
                                        <input type="text" class="form-control" name="TransferDate" id="transferdate">
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">បិទ</button>
                    <button type="submit" class="btn btn-primary" id="save">រក្សាទុក</button>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection
@section('script')
<script src="{{url('/script/plugin/bootstrap/moment-with-locales.js')}}" charset="utf-8"></script>
<script src="{{url('/script/plugin/bootstrap/bootstrap-datetimepicker.js')}}" charset="utf-8"></script>
<script type="text/javascript">
(function(){
    SetValidation();

    var select;

    $('#transferdate').datetimepicker({
        defaultDate: moment()
    });

    $('body').on('click', '.transfer', function () {
        select = $(this).closest('tr');
        var id = $(select).attr('data-id');
        $('[name="Id"]').val(id);
        $('#transfermodal').modal({
            backdrop:'static'
        });
    });

    $('#transfermodal').on('hidden.bs.modal', function (e) {
        select = '';
        $('[name="Id"]').val('');
        $('[name="CarNumber"][value=""]').prop('selected', true);
        $('#transferdate').data("DateTimePicker").date(moment());
    });

    function SaveOrUpdate() {
        $('body').append(Loading());
        var item = $('#formTransfer').serialize();
        $.ajax({
            type: 'POST',
            url: burl + '/transfer/sale',
            data: item
        }).done(function (data) {
            if (data.IsError == false) {
                $(select).remove();
                $('#transfermodal').modal('hide');
                $('#formTransfer').bootstrapValidator("resetForm", true);
            } else {
                swal(data.Message, '', 'success');
            }
        }).complete(function (data) {
            $('body').find('.loading').remove();
        });
    }

    function SetValidation() {
        var form = $('body').find('#formTransfer');
        form.bootstrapValidator({
            feedbackIcons: {
                valid: 'glyphicon glyphicon-ok',
                invalid: 'glyphicon glyphicon-remove',
                validating: 'glyphicon glyphicon-refresh'
            },
            fields: {
                CarNumber: {
                    validators: {
                        notEmpty: {
                            message: 'សូមបញ្ចូលលេខឡាន'
                        }
                    }
                },
                TransferDate: {
                    validators: {
                        notEmpty: {
                            message: 'សូមបញ្ចូលថ្ងៃខែឆ្នាំដឹកចេញ'
                        }
                    }
                }
            }
        }).on('success.form.bv', function (e) {
            SaveOrUpdate();
        });
        $('body').on('click', '#save', function (e) {
            form.bootstrapValidator('validate');
        });
    }
})();
</script>
@endsection
