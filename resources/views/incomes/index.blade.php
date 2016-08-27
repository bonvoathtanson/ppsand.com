@extends('layouts.admin')
@section('content')
<div class="box-title">
    <i class="fa fa-list" aria-hidden="true"></i> តារាងចំណូល
</div>
<div style="padding:5px 0px; text-align:right;">
    <a href="{{url('/create/income')}}" class="btn btn-primary"><i class="fa fa-cart-plus" aria-hidden="true"></i> ចំណូលការលក់</a>
    <a href="{{url('/create/otherincome')}}" class="btn btn-primary"><i class="fa fa-credit-card" aria-hidden="true"></i> ចំណូលផ្សេងៗ</a>
</div>
<div class="panel panel-default">
    <div class="panel-body">
        <table class="table-ed">
            <tbody>
                <tr>
                    <td style="width:280px;" colspan="3">
                        <div class="input-group">
                            <input type="text" id="customerName" name="customerName" class="form-control btn-default" placeholder="ជ្រើសរើសអតិថិជន">
                            <span class="input-group-btn">
                                <button class="btn btn-success" style="border:1px solid #419641;" type="button">សំអាត</button>
                            </span>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td style="width:150px;"><input type="text" id="saleFromDate" name="saleFromDate" class="form-control" placeholder="ចាប់ពីថ្ងៃ"></td>
                    <td style="vertical-align:middle;"><span>ដល់</span></td>
                    <td style="width:150px;"><input type="text" id="saleToDate" name="saleToDate" class="form-control" placeholder="ដល់ថ្ងៃ"></td>
                    <td>
                        <button type="button" id="btnsearch" class="btn btn-success">ស្វែងរក</button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
<table id="incomeTable" class="table table-bordered table-hover">
    <thead>
        <tr class="bg-whife">
            <th>ថ្ងៃខែឆ្នាំចំណូល</th>
            <th>អតិថិជន</th>
            <th class="center">បរិយាយ</th>
            <th style="text-align:right;">ចំនួនសរុប</th>
            <th class="center" style="width:40px;"></th>
        </tr>
    </thead>
    <tbody></tbody>
</table>
@endsection
@section('script')
<script src="{{url('/script/plugin/bootstrap/moment-with-locales.js')}}" charset="utf-8"></script>
<script src="{{url('/script/incomes/income.index.js')}}" charset="utf-8"></script>
@endsection
