(function(){
  ViewItem();

  function ViewItem(){
    GetItems(function(items){
      RenderTable(items, function(element){
        $('#itemTable tbody').html(element);
      });
    });
  }

  function GetItems(callback) {
    $('body').append(Loading());
    $.ajax({
      url: burl + '/find/item',
      type: 'GET',
      dataType: 'JSON',
      contentType: 'application/json; charset=utf-8',
    }).done(function (data) {
      if(data.IsError == false){
        if(typeof callback == 'function'){
          callback(data.Data);
        }
      }
    }).complete(function (data) {
      $('body').find('.loading').remove();
    });
  }

  function RenderTable(items, callback){
    var element = '';
    if((items != null) && (items.length > 0)){
      $.each(items, function(index, item){
        element += '<tr data-id="' + item.Id + '">' +
                      '<td>' + item.ItemCode + '</td>' +
                      '<td>' + item.ItemName + '</td>' +
                      '<td class="center">' + item.SalePrice + '</td>' +
                      '<td class="center">' + item.UnitInStock + '</td>' +
                      '<td class="center">' +
                         '<a href="' + burl + '/edit/item/' + item.Id + '" class="btn btn-success btn-e"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a> ' +
                         '<button type="button" class="btn btn-danger btn-e delete"><i class="fa fa-trash-o" aria-hidden="true"></i></button>' +
                      '</td>'
                   '</tr>';
      });
    }
    if(typeof callback == 'function'){
      callback(element);
    }
  }

  $('body').on('click', '.delete', function () {
    var select = $(this).closest('tr');
    var id = $(select).attr('data-id');
    swal({
      title: 'លុប',
      text: 'តើអ្នកចង់លុបទិន្នន័យឬ ?',
      type: 'warning',
      showCancelButton: true,
      confirmButtonText: 'យល់ព្រម',
      cancelButtonText: 'បោះបង់',
      closeOnConfirm: false
    }, function () {
      $('body').append(Loading());
      $.ajax({
        type: 'GET',
        url: burl+'/delete/item/'+id,
        dataType: "JSON",
        contentType: 'application/json; charset=utf-8',
      }).done(function (data) {
        if (data.IsError == false) {
          swal('ទិន្នន័យត្រូវបានលុបជោគជ័យ', '', 'success');
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
