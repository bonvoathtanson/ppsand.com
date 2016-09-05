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
        <div class="font-M1 center" style="font-size:14pt;">ភ្នំពេញខ្សាច់</div>
        <div class="font-M1 center" style="font-size:12pt;">
            តារាងចំណាយ
        </div>
        <div class="font-HA center" style="font-size:11pt;">
            អាស័យដ្ឋានៈ វិថីស៊ីសុវិត្ថិ សង្កាត់ស្រះចក ខណ្ឌដូនពេញ រាជធានីភ្នំពេញ
        </div>
        <div class="font-HA center" style="font-size:11pt;">
            លេខទូរស័ព្ទៈ ០១៧​ ៨៦ ៨៨ ៦៧
        </div>
    </div>
    <div class="print-body">
      <table class="table table-bordered" style="width:100%;">
        <thead>
          <tr class="warning font-M1">
            <th>ថ្ងៃខែចំណាយ</th>
            <th>ប្រភេទចំណាយ</th>
            <th class="center">បរិយាយ</th>
            <th class="center">ចំនួនសរុប</th>
          </tr>
        </thead>
        <tbody>
            <?php
                    $totalamount = 0;
             foreach ($expanses as $key => $value): 
                    $expanseType  ='ចំណាយការទិញ';
                if($value->ExpanseType ==0){
                    $expanseType ='ចំណាយផ្សេងៗ';
                }
                    $totalamount += $value->TotalAmount;
             ?>
                <tr>
                    <td class="center">{{$value->ExpanseDate}}</td>
                    <td class="center">{{$expanseType}}</td>
                    <td class="center">{{$value->Description}}</td>
                    <td class="center">{{$value->TotalAmount}}</td>
                </tr>
            <?php endforeach; ?>
        </tbody>
        <tfoot>
            <tr>
                <td colspan="3" style="text-align:right;border-right:solid 1px;border-left:solid 1px white;border-bottom:solid 1px white;">សរុប </td>
                <td class="center">
                    <span id="remain" style=" font-weight:bold;">{{$totalamount}}</span>
                </td>
            </tr>
        </tfoot>
      </table>
    </div>
    <div class="print-footer">

    </div>
  </div>
</body>
</html>
