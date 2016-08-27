<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>បោះពុម្ភ ទំនិញដែលត្រូវដឹកចេញ</title>
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet" crossorigin="anonymous">
  <link rel="stylesheet" href="{{url('/css/print.css')}}" media="all" title="no title" charset="utf-8">
</head>
</head>
<body>
  <div class="container-A4">
    <div class="print-header">
        <div class="font-M1 center" style="font-size:14pt;">ភ្នំពេញខ្សាច់</div>
        <div class="font-M1 center" style="font-size:12pt;">
            តារាងប្រភេទខ្សាច់
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
            <th>ឈ្មោះអតិថិជន</th>
            <th>ឈ្មោះទំនិញ</th>
            <th class="center">ថ្ងៃខែឆ្នាំលក់</th>
            <th class="center">ថ្ងៃខែឆ្នាំដឹកចេញ</th>
            <th class="center">ចំនួន</th>
            <th class="center">លេខឡាន</th>
          </tr>
        </thead>
        <tbody>
                <tr>
                    <td>{{$transfer->Customer->CustomerName}}</td>
                    <td>{{$transfer->Item->ItemName}}</td>
                    <td class="center">{{$transfer->SaleDate}}</td>
                    <td class="center">{{date_format(date_create($transfer->TransferDate),'Y-m-d ម៉ោង H:i')}}</td>
                    <td class="center">{{$transfer->Quantity}}</td>
                    <td class="center">{{$transfer->CarNumber}}</td>
                </tr>
        </tbody>
      </table>
    </div>
    <div class="print-footer">

    </div>
  </div>
</body>
</html>
