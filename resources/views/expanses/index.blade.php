@extends('layouts.admin')
@section('content')
<div class="box-title">
  <i class="fa fa-list" aria-hidden="true"></i> តារាងចំណាយ
</div>
<div class="row memu-bar">
  <div class="col-sm-12">
    <div class="pull-right">
      <a href="{{url('/create/expanse')}}" class="btn btn-primary"><i class="fa fa-plus" aria-hidden="true"></i> បន្ថែម</a>
    </div>
  </div>
</div>
<div class="row">
  <div class="col-sm-12">
    <table class="table table-bordered table-hover">
      <thead>
        <tr class="warning">
          <th class="center" style="width:80px;">#</th>
          <th>ថ្ងៃខែចំណាយ</th>
          <th>ប្រភេទចំណាយ</th>
          <th>ឈ្មោះអ្នកផ្គត់ផ្គង់</th>
          <th class="center">បរិយាយ</th>
          <th class="center">ចំនួនសរុប</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($expanses as $key => $value): ?>
          <?php
            $type = 'ចំណាយផ្សេងៗ';
            if($value->ExpanseType == 1){
              $type = 'ចំណាយការលក់';
            }

            $supplier = '';
            if($value->Supplier != null){
              $supplier = $value->Supplier->SupplierName;
            }
          ?>
          <tr data-id="{{$value->Id}}">
            <td class="center">
              <button class="btn btn-success btn-e"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button>
              <button class="btn btn-danger btn-e"><i class="fa fa-trash-o" aria-hidden="true"></i></button>
            </td>
            <td>{{$value->ExpansesDate}}</td>
            <td>{{$type}}</td>
            <td>{{$supplier}}</td>
            <td class="center">{{$value->Description}}</td>
            <td style="text-align:right;">{{$value->TotalAmount}}</td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>
</div>
@endsection
