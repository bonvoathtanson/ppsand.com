<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>ប្រព័ន្ធសុវត្តិភាព</title>
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet" crossorigin="anonymous">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" crossorigin="anonymous">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" crossorigin="anonymous">
  <link rel="stylesheet" href="{{url('/css/plugin/sweet/sweetalert.css')}}" media="screen" title="no title" charset="utf-8">
  <link rel="stylesheet" href="{{url('/css/base.css')}}" media="screen" title="no title" charset="utf-8">
</head>
<body style="background:#f2f2f2;">
  <div class="container">
    <div class="row">
      <div class="col-md-6 col-md-offset-3">
        <div class="panel panel-default" style="margin-top:25px;">
          <div class="panel-heading">ចូលប្រើប្រាស់ប្រព័ន្ធ</div>
          <div class="panel-body" style="padding-top:25px; padding-buttom:25px;">
            <form class="form-horizontal" role="form" method="POST" action="{{ url('/dologin') }}">
              {{ csrf_field() }}

              <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                <label for="email" class="col-md-4 control-label">ឈ្មោះគណនេយ្យ</label>

                <div class="col-md-6">
                  <input id="email" type="text" class="form-control" name="name" value="{{ old('name') }}">
                </div>
              </div>

              <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                <label for="password" class="col-md-4 control-label">លេខសំងាត់</label>
                <div class="col-md-6">
                  <input id="password" type="password" class="form-control" name="password">
                </div>
              </div>

              <div class="form-group">
                <div class="col-md-6 col-md-offset-4">
                  <button type="submit" class="btn btn-primary">
                    <i class="fa fa-btn fa-sign-in"></i> ចូល
                  </button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>
</html>
