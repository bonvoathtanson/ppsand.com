@extends('layouts.admin')
@section('content')
<div class="box-title">
    <i class="fa fa-list" aria-hidden="true"></i> តារាងចំណូល
</div>
<div class="row memu-bar">
    <div class="col-sm-12">
        <div class="pull-right">
            <a href="{{url('/create/income')}}" class="btn btn-primary"><i class="fa fa-plus" aria-hidden="true"></i> បន្ថែម</a>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-sm-12">
        <table id="incomeTable" class="table table-bordered table-hover">
            <thead>
                <tr class="warning">
                    <th>អតិថិជន់</th>
                    <th>ថ្ងៃខែឆ្នាំចំណូល</th>
                    <th>ប្រភេទចំណូល</th>
                    <th>បរិយាយ</th>
                    <th>ចំនួនសរុប</th>
                    <th class="center" style="width:80px;"></th>
                </tr>
            </thead>
            <tbody></tbody>
        </table>
    </div>
</div>
@endsection
@section('script')
<script src="{{url('/script/incomes/income.index.js')}}" charset="utf-8"></script>
@endsection
