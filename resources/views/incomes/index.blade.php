@extends('layouts.admin')
@section('content')
<div class="box-title">
    <i class="fa fa-list" aria-hidden="true"></i> តារាងចំណូល
</div>
<div class="row memu-bar">
    <div class="col-sm-12">
        <div class="pull-right">
            <a href="{{url('/view/selectcustomer')}}" class="btn btn-primary"><i class="fa fa-cart-plus" aria-hidden="true"></i> សងប្រាក់</a>
            <!-- <a href="{{url('/create/otherincome')}}" class="btn btn-primary"><i class="fa fa-credit-card" aria-hidden="true"></i> ចំណូលផ្សេងៗ</a> -->
        </div>
    </div>
</div>
<div class="row">
    <div class="col-sm-12">
        <table id="incomeTable" class="table table-bordered table-hover">
            <thead>
                <tr class="warning">
                    <th>ថ្ងៃខែឆ្នាំចំណូល</th>
                    <th>អតិថិជន</th>
                    <th class="center">បរិយាយ</th>
                    <th style="text-align:right;">ចំនួនសរុប</th>
                    <th class="center" style="width:40px;"></th>
                </tr>
            </thead>
            <tbody></tbody>
        </table>
    </div>
</div>
@endsection
@section('script')
<script src="{{url('/script/plugin/bootstrap/moment-with-locales.js')}}" charset="utf-8"></script>
<script src="{{url('/script/incomes/income.index.js')}}" charset="utf-8"></script>
@endsection
