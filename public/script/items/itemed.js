(function(){
  $('body').on('click', '#save', function(){
      SaveOrUpdate();
  });

  function SaveOrUpdate(callback) {
    var item = $('#formItem').serialize();
    $.ajax({
      type: 'POST',
      url: burl + '/insert/item',
      data: item
    }).done(function (data) {
      if (data.IsError == false) {
        swal('ការបញ្ចូលគណនេយ្យប្រើប្រាស់បានជោយជ័យ', '', 'success');
      } else {
        swal(data.Message, '', 'success');
      }
    });
  }
})();
