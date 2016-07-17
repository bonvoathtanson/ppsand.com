<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>ប្រព័ន្ធគ្រប់គ្រងខ្សាច់</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" crossorigin="anonymous">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" crossorigin="anonymous">
  <link rel="stylesheet" href="{{url('css/base.css')}}" media="screen" title="no title" charset="utf-8">
  @yield('css')
</head>
<body>
  <header>
    <nav class="navbar navbar-default">
      <div class="container-fluid">
        <div class="navbar-header"><a class="navbar-brand" href="{{url('/')}}">ប្រព័ន្ធគ្រប់គ្រងខ្សាច់</a></div>
      </div>
    </nav>
  </header>
  <div class="container-fluid">
    <div class="row">
      <div class="col-sm-2">
        <div class="list-group">
          <a href="javascript:void(0);" class="list-group-item active">មាតិការ</a>
          <a href="{{url('/view/sale/')}}" class="list-group-item">ការលក់ចេញ</a>
          <a href="{{url('/view/import/')}}" class="list-group-item">ការទិញចូល</a>
          <a href="{{url('/view/customer/')}}" class="list-group-item">អតិថិជន់</a>
          <a href="{{url('/view/supplier/')}}" class="list-group-item">អ្នកផ្គត់ផ្គង់</a>
          <a href="{{url('/view/income/')}}" class="list-group-item">ចំណូល</a>
          <a href="{{url('/view/expanse/')}}" class="list-group-item">ចំណាយ</a>
          <a href="{{url('/view/item/')}}" class="list-group-item">មុខទំនិញ</a>
          <a href="{{url('/view/user/')}}" class="list-group-item">គណនេយ្យអ្នកប្រើប្រាស់</a>
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
@yield('script')
</html>
