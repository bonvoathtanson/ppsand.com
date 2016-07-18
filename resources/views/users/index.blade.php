@extends('layouts.admin')
@section('content')
<div class="box-title">
  <i class="fa fa-list" aria-hidden="true"></i> តារាងឈ្មោះគណនេយ្យអ្្នកប្រើប្រាស់
</div>
<div class="row memu-bar">
  <div class="col-sm-12">
    <div class="pull-right">
      <a href="{{url('/create/user')}}" class="btn btn-primary"><i class="fa fa-plus" aria-hidden="true"></i> បន្ថែម</a>
    </div>
  </div>
</div>
<div class="row">
  <div class="col-sm-12">
    <table class="table table-bordered table-hover">
      <thead>
        <tr class="warning">
          <th class="center" style="width:100px;">ល.រ</th>
          <th>ឈ្មោះគណនេយ្យ</th>
          <th>ថ្ងៃបង្កើត</th>
          <th class="center" style="width:20px;"></th>
        </tr>
      </thead>
      <tbody>
        <?php
          foreach ($users as $key => $value) {
            echo '<tr data-id="'.$value->Id.'">';
              echo '<td class="center">'.($key+1).'</td>';
              echo '<td>'.$value->Name.'</td>';
              echo '<td>'.$value->DateCreated.'</td>';
              echo '<td class="center">';
              echo '<button class="btn btn-danger btn-e"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button>';
              echo '</td>';
            echo '</tr>';
          }
        ?>
      </tbody>
    </table>
  </div>
</div>
@endsection
