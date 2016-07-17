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
        <div class="navbar-header"><a class="navbar-brand" href="#">ប្រព័ន្ធគ្រប់គ្រងខ្សាច់</a></div>
      </div>
    </nav>
  </header>
  <div class="container-fluid">
    <div class="row">
      <div class="col-sm-2">
        <div class="list-group">
          <a href="javascript:void(0);" class="list-group-item active">មាតិការ</a>
          <a href="#" class="list-group-item">ការលក់</a>
          <a href="#" class="list-group-item">ការទិញ</a>
          <a href="#" class="list-group-item">ចំណូល</a>
          <a href="#" class="list-group-item">ចំណាយ</a>
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
