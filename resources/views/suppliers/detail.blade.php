@extends('layouts.admin')
@section('css')
<link rel="stylesheet" href="{{url('/css/plugin/datetimepicker/bootstrap-datetimepicker.min.css')}}" media="screen" title="no title" charset="utf-8">
@endsection
@section('content')
<div class="box-title">
  <i class="fa fa-plus-square" aria-hidden="true"></i> ព័ត៍មានលំអិតអ្នកផ្គត់ផ្គង់ឈ្មោះ [{{$supplier->SupplierName}}]
</div>
<form id="formSale" class="form-horizontal" onsubmit="return false;">
    {{ csrf_field() }}
    <input type="hidden" name="CustomerId" value="{{$supplier->Id}}">
    <div class="panel panel-default">
        <div class="panel-body">
            <div class="form-group">
                <label class="col-sm-1 control-label" style="width:150px;">ឈ្មោះអ្នកផ្គត់ផ្គង់</label>
                <div class="col-sm-1" style="width:300px;">
                    <input type="text" class="form-control btn-default" value="{{$supplier->SupplierName}}">
                </div>
                <div class="col-sm-1" style="width:280px; padding-left:0;">
                    <a href="{{url('/view/selsupplier')}}" class="btn btn-success">ជ្រើសរើសអ្នកផ្គត់ផ្គង់​</a>
                    <a href="{{url('/create/supplier')}}" class="btn btn-primary">បន្ថែមអ្នកផ្គត់ផ្គង់ថ្មី</a>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-1 control-label" style="width:150px;">អាស័យដ្ឋាន</label>
                <div class="col-sm-1" style="width:580px;">
                    <input type="text" class="form-control btn-default" readonly value="{{$supplier->Address}}">
                </div>
            </div>
        </div>
    </div>
    <div class="row" style="margin-bottom:5px;">
        <div class="col-sm-12" style="padding-left:0;">
            <div class="col-sm-1" style="width:200px;">

            </div>
            <div class="pull-right">
                <a href="{{url('/create/import').'/'.$supplier->Id}}" class="btn btn-primary">បន្ថែមកានាំចូល</a>
                <a href="{{url('/create/expanse').'/'.$supplier->Id}}" class="btn btn-danger">បង់លុយ</a>
            </div>
        </div>
    </div>
    <div class="nav-tabs-custom">
        <ul class="nav nav-tabs" role="tablist">
            <li role="presentation" class="active"><a href="#box-tap1" class="font-M1" aria-controls="home" role="tab" data-toggle="tab">ទំនិញមិនទាន់ដឹកចូល</a></li>
            <li role="presentation"><a href="#box-tap2" class="font-M1" aria-controls="home" role="tab" data-toggle="tab">មិនទាន់ទូទាត់</a></li>
            <li role="presentation"><a href="#box-tap3" class="font-M1" aria-controls="home" role="tab" data-toggle="tab">ទូទាត់ហើយ</a></li>
        </ul>
        <div class="tab-content">
            <div role="tabpanel" class="tab-pane fade in active" id="box-tap1">
                <table class="table table-bordered table-hover">
                    <thead>
                        <tr class="bg-white">
                            <th>មុខទំនិញ</th>
                            <th class="center">ថ្ងៃខែឆ្នាំបញ្ជាទិញ</th>
                            <th class="center">ចំនួន</th>
                            <th class="center">ត្រូវដឹកចូល</th>
                            <th style="width:25px;"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($transfers as $index => $value): ?>
                            <tr data-id="{{$value->Id}}">
                                <td>{{$value->Item->ItemName}}</td>
                                <td class="center">{{date_format(date_create($value->SaleDate), 'Y-m-d H:i')}}</td>
                                <td class="center">{{$value->Quantity}}</td>
                                <td class="center">{{date_format(date_create($value->SaleDate), 'Y-m-d ម៉ោង H:i')}}</td>
                                <td>
                                    <button type="button" class="btn btn-danger btn-e transfer">ដឹកចូល</button>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
            <div role="tabpanel" class="tab-pane fade" id="box-tap2">
                <table class="table table-bordered table-hover">
                    <thead>
                        <tr class="bg-white">
                            <th>មុខទំនិញ</th>
                            <th class="center">ថ្ងៃខែឆ្នាំលក់</th>
                            <th class="center">ចំនួន</th>
                            <th class="center">តំលៃលក់</th>
                            <th style="text-align:right;">ទឹកប្រាក់សរុប</th>
                            <th style="text-align:right;">ទឹកប្រាក់បង់</th>
                            <th style="text-align:right;">ទឹកនៅសល់</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($oncredits as $key => $value): ?>
                            <tr>
                                <td>{{$value->Item->ItemName}}</td>
                                <td class="center">{{date_format(date_create($value->SaleDate), 'Y-m-d H:i')}}</td>
                                <td class="center">{{$value->Quantity}}</td>
                                <td class="center">{{$value->SalePrice}}</td>
                                <td style="text-align:right;">{{$value->SubTotal}}</td>
                                <td style="text-align:right;">{{$value->PayAmount}}</td>
                                <td style="text-align:right;">{{$value->SubTotal - $value->PayAmount}}</td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
            <div role="tabpanel" class="tab-pane fade" id="box-tap3">
                <table class="table table-bordered table-hover">
                    <thead>
                        <tr class="bg-white">
                            <th>មុខទំនិញ</th>
                            <th>ថ្ងៃខែឆ្នាំលក់</th>
                            <th class="center">លេខឡាន</th>
                            <th class="center">ចំនួន</th>
                            <th class="center">តំលៃលក់</th>
                            <th style="text-align:right;">ចំនួនទឹកប្រាក់</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($onpayoffs as $key => $value): ?>
                            <tr>
                                <td>{{$value->Item->ItemName}}</td>
                                <td class="center">{{date_format(date_create($value->SaleDate), 'Y-m-d H:i')}}</td>
                                <td class="center">{{$value->CarNumber}}</td>
                                <td class="center">{{$value->Quantity}}</td>
                                <td class="center">{{$value->SalePrice}}</td>
                                <td style="text-align:right;">{{$value->SubTotal}}</td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</form>
@endsection
@section('script')
<script src="{{url('/script/plugin/bootstrap/moment-with-locales.js')}}" charset="utf-8"></script>
<script src="{{url('/script/plugin/bootstrap/bootstrap-datetimepicker.js')}}" charset="utf-8"></script>
<script src="{{url('/script/imports/import.detail.js')}}" charset="utf-8"></script>
@endsection
