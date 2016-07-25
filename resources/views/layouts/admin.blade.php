<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>ប្រព័ន្ធគ្រប់គ្រងខ្សាច់</title>
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet" crossorigin="anonymous">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" crossorigin="anonymous">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" crossorigin="anonymous">
  <link rel="stylesheet" href="{{url('/css/plugin/sweet/sweetalert.css')}}" media="screen" title="no title" charset="utf-8">
  <link rel="stylesheet" href="{{url('/css/base.css')}}" media="screen" title="no title" charset="utf-8">
  @yield('css')
</head>
<body>
  <header>
    <nav class="navbar navbar-default">
      <div class="container-fluid">
        <div class="navbar-header"><a class="navbar-brand font-M1" href="{{url('/')}}"><i class="fa fa-home" aria-hidden="true"></i> ប្រព័ន្ធគ្រប់គ្រងខ្សាច់</a></div>
        <ul class="nav navbar-nav navbar-right">
            <li><a href="{{url('/view/timetransfer')}}"><i class="fa fa-bell-o" aria-hidden="true"></i> ទំនិញដល់ពេលដឹកចេញ <span class="badge">2</span></a></li>
          <li><a href="{{url('/logout')}}"><i class="fa fa-sign-out" aria-hidden="true"></i> ចាកចេញ</a></li>
        </ul>
      </div>
    </nav>
  </header>
  <div class="container-fluid">
    <div class="row">
      <div class="col-sm-2">
        <div class="list-group">
          <a href="javascript:void(0);" class="list-group-item active font-M1 center">មាតិកា</a>
          <a href="{{url('/view/transfer')}}" class="list-group-item"><i class="fa fa-cart-plus" aria-hidden="true"></i> ទំនិញត្រូវដឹកចេញ <span class="badge">2</span></a>
          <a href="{{url('/view/sale')}}" class="list-group-item"><i class="fa fa-cart-plus" aria-hidden="true"></i> ការលក់ចេញ</a>
          <a href="{{url('/view/import')}}" class="list-group-item"><i class="fa fa-download" aria-hidden="true"></i> ការទិញចូល</a>
          <a href="{{url('/view/customer')}}" class="list-group-item"><i class="fa fa-user-secret" aria-hidden="true"></i> អតិថិជន</a>
          <a href="{{url('/view/supplier')}}" class="list-group-item"><i class="fa fa-user-plus" aria-hidden="true"></i> អ្នកផ្គត់ផ្គង់</a>
          <a href="{{url('/view/income')}}" class="list-group-item"><i class="fa fa-money" aria-hidden="true"></i> ចំណូល</a>
          <a href="{{url('/view/expanse')}}" class="list-group-item"><i class="fa fa-share-alt-square" aria-hidden="true"></i> ចំណាយ</a>
          <a href="{{url('/view/item')}}" class="list-group-item"><i class="fa fa-shopping-bag" aria-hidden="true"></i> មុខទំនិញ</a>
          <a href="{{url('/view/user')}}" class="list-group-item"><i class="fa fa-users" aria-hidden="true"></i> គណនីអ្នកប្រើប្រាស់</a>
        </div>
      </div>
      <div class="col-sm-10">
        @yield('content')
      </div>
    </div>
  </div>
</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.4/jquery.min.js" charset="utf-8"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" crossorigin="anonymous"></script>
<script src="{{url('/script/plugin/sweet/sweetalert.min.js')}}" charset="utf-8"></script>
<script src="{{url('/script/plugin/bootstrap/bootstrapValidator.js')}}" charset="utf-8"></script>
<script src="{{url('/script/app.js')}}" charset="utf-8"></script>
@yield('script')
</html>
