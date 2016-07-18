(function(){
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
      $.ajax({
        type: 'GET',
        url: burl+'/delete/item/'+id,
        dataType: "JSON",
        contentType: 'application/json; charset=utf-8',
      }).done(function (data) {
        console.log(data);
        if (data.IsError == false) {
          swal('ទិន្នន័យត្រូវបានលុបជោគជ័យ', '', 'success');
          $(select).remove();
        } else {
          swal(data.Message, '', 'success');
        }
      });
    });
  });
})();
