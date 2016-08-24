<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>បោះពុម្ភ តារាងមុខទំនិញ</title>
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet" crossorigin="anonymous">
  <link rel="stylesheet" href="{{url('/css/print.css')}}" media="all" title="no title" charset="utf-8">
</head>
</head>
<body>
  <div class="container-A4">
    <div class="print-header">
    </div>
    <div class="print-body">
      <table class="table table-bordered" style="width:100%;">
        <thead>
          <tr class="warning font-M1">
            <th>លេខកូដ</th>
            <th>ឈ្មោះទំនិញ</th>
            <th class="center">តំលៃលក់</th>
            <th class="center">ចំនួនក្នុងស្តុក</th>
          </tr>
        </thead>
        <tbody>
            <?php foreach ($items as $key => $value): ?>
                <tr>
                    <td>{{$value->ItemCode}}</td>
                    <td>{{$value->ItemName}}</td>
                    <td class="center">{{$value->SalePrice}}</td>
                    <td class="center">{{$value->UnitInStock}}</td>
                </tr>
            <?php endforeach; ?>
        </tbody>
      </table>
    </div>
    <div class="print-footer">

    </div>
  </div>
</body>
</html>
