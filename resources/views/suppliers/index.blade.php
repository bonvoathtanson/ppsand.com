@extends('layouts.admin')
@section('content')
<div class="box-title">
    <i class="fa fa-list" aria-hidden="true"></i> បញ្ចីរាយនាមអ្នកផ្គត់ផ្គង់
</div>
<div class="row memu-bar">
    <div class="col-sm-12">
        <div class="pull-right">
            <a href="{{url('/create/supplier')}}" class="btn btn-primary"><i class="fa fa-plus" aria-hidden="true"></i> បន្ថែម</a>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-sm-12">
        <table id="supplierTable" class="table table-bordered table-hover">
            <thead>
                <tr class="bg-whife">
                    <th>លេខកូដ</th>
                    <th>ឈ្មោះអ្នកផ្គត់ផ្គង់</th>
                    <th>ភេទ</th>
                    <th>លេខទូរស័ព្ទ</th>
                    <th>អស័យដ្ឋាន</th>
                    <th class="center" style="width:80px;"></th>
                </tr>
            </thead>
            <tbody></tbody>
        </table>
    </div>
</div>
@endsection
@section('script')
<script src="{{url('/script/suppliers/supplier.index.js')}}" charset="utf-8"></script>
@endsection
