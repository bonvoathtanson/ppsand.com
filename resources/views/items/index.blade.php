@extends('layouts.admin')
@section('content')
<div class="box-title">
    <i class="fa fa-list" aria-hidden="true"></i> តារាងមុខទំនិញ
</div>
<p style="font-size:10pt; color:#0856ab;">※ ដើម្បីធ្វើការបង្កើតនូវមុខទំនិញថ្មីសូមចុចលើប៉ូតុងបន្ថែម <span class="btn btn-primary btn-xs"><i class="fa fa-plus" aria-hidden="true"></i> បន្ថែម</span>
※ ដើម្បីធ្វើការកែប្រែនូវមុខទំនិញសូមចុចលើប៉ូតុង <span class="btn btn-success btn-xs"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></span>
※ ដើម្បីធ្វើការលុបនូវមុខទំនិញសូមចុចលើប៉ូតុង <span class="btn btn-danger btn-xs"><i class="fa fa-trash-o" aria-hidden="true"></i></span></p>
<div class="row memu-bar">
    <div class="col-sm-12">
        <div class="pull-right">
            <a href="{{url('/create/item')}}" class="btn btn-primary"><i class="fa fa-plus" aria-hidden="true"></i> បន្ថែម</a>
            <button class="btn btn-primary"><i class="fa fa-plus" aria-hidden="true"></i> កំណត់ស្តុក</button>
            <a href="{{url('/report/item')}}" class="btn btn-primary"><i class="fa fa-plus" aria-hidden="true"></i> បោះពុម្ភ</a>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-sm-12">
        <table id="itemTable" class="table table-bordered table-hover">
            <thead>
                <tr class="warning">
                    <th>លេខកូដ</th>
                    <th>ឈ្មោះទំនិញ</th>
                    <th class="center">តំលៃលក់</th>
                    <th class="center">ចំនួនក្នុងស្តុក</th>
                    <th style="width:80px;"></th>
                </tr>
            </thead>
            <tbody></tbody>
        </table>
    </div>
</div>
@endsection
@section('script')
<script src="{{url('/script/items/item.js')}}" charset="utf-8"></script>
@endsection
