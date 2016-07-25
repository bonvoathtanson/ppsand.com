@extends('layouts.admin')
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
          <th class="center">លេខឡាន</th>
          <th class="center">ចំនួន</th>
          <th class="center">តំលៃលក់</th>
          <th style="text-align:right;">ទឹកប្រាក់សរុប</th>
          <th style="text-align:right;">ប្រាកទទួល</th>
          <th style="text-align:right;">ប្រាក់នៅសល់</th>
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
                  <td class="center">{{$sale->CarNumber}}</td>
                  <td class="center">{{$sale->Quantity}}</td>
                  <td class="center">{{$sale->SalePrice}}</td>
                  <td style="text-align:right;">{{$sale->SubTotal}}</td>
                  <td style="text-align:right;">{{$sale->PayAmount}}</td>
                  <td style="text-align:right;">{{$sale->SubTotal - $sale->PayAmount}}</td>
                  <td class="center">
                      <button type="button" class="btn btn-danger btn-e transfer">ដឹកចេញ</button>
                  </td>
              </tr>
          <?php endforeach; ?>
      </tbody>
    </table>
  </div>
</div>
@endsection
@section('script')
<script type="text/javascript">
    (function(){
        $('body').on('click', '.transfer', function () {
            var select = $(this).closest('tr');
            var id = $(select).attr('data-id');
            swal({
                title: 'ដឹកទំនិញអោយគេ',
                text: 'តើអ្នកពិតជាបានដឹកទំនិញចេញម៉ែនឬទេ?',
                type: 'warning',
                showCancelButton: true,
                confirmButtonText: 'យល់ព្រម',
                cancelButtonText: 'បោះបង់',
                closeOnConfirm: false
            }, function () {
                $('body').append(Loading());
                $.ajax({
                    type: 'GET',
                    url: burl + '/transfer/sale/' + id,
                    dataType: "JSON",
                    contentType: 'application/json; charset=utf-8',
                }).done(function (data) {
                    if (data.IsError == false) {
                        swal('ទំនិញត្រូវបានដឹកចេញបានជោកជ័យ', '', 'success');
                        $(select).remove();
                    } else {
                        swal(data.Message, '', 'success');
                    }
                }).complete(function (data) {
                    $('body').find('.loading').remove();
                });
            });
        });
    })();
</script>
@endsection
