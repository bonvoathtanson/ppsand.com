@extends('layouts.admin')
@section('content')
<div class="box-title">
    <i class="fa fa-list" aria-hidden="true"></i> តារាងអ្នកសួរព័តមាន
</div>
<div class="row memu-bar">
    <div class="col-sm-12">
        <div class="pull-right">
            <a href="{{url('/view/selectcustomer')}}" class="btn btn-primary"><i class="fa fa-plus" aria-hidden="true"></i> ជ្រើសរើសអតិថិជន</a>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-sm-12">
        <table id="customerTable" class="table table-bordered table-hover">
            <thead>
                <tr class="bg-white">
                    <th>ឈ្មោះអតិថិជន</th>
                    <th class="center">ថ្ងៃសួរពត័មាន</th>
                    <th class="center">ថ្ងៃសួរបញ្ជាក់</th>
                    <th>បរិយាយ</th>
                    <th class="center" style="width:80px;"></th>
                </tr>
            </thead>
            <tbody></tbody>
        </table>
    </div>
</div>
@endsection
@section('script')
<script src="{{url('/script/plugin/bootstrap/moment-with-locales.js')}}" charset="utf-8"></script>
<script src="{{url('/script/customers/info.index.js')}}" charset="utf-8"></script>
@endsection
