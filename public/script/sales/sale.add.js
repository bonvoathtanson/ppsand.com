(function() {
    $('#saledate').datetimepicker({
        defaultDate: new Date()
    });
    $('#transferdate').datetimepicker({
        defaultDate: new Date()
    });

    $('body').on('keypress', '#itemcode', function(event){
        if(event.which == 13){
            var value = $(this).val();
            if(value != null && value != '')
            {
                GetItemDetail(value, function(item){
                    if(item != null && item != undefined)
                    {
                        $('#itemid').val(item.Id);
                        $('#itemname').text('ឈ្មោះមុខទំនិញ [ ' + item.ItemName + ' ]');
                        $('#saleprice').val(item.SalePrice);
                        $('#myModal').modal({
                          backdrop: false
                        });
                    }
                });
            }
            $(this).val('');
        }
    });
    $('#myModal').on('shown.bs.modal', function (e) {
        $('#quantity').focus();
    });

    $('#myModal').on('hidden.bs.modal', function (e) {
        $('#itemid').val('');
        $('#itemname').text('');
        $('#quantity').val('');
        $('#saleprice').val('');
        $('#carnumber').val('');
        $('#typeid option[value="1"]').prop('selected', true).change();
    });

    $('body').on('keypress', '#quantity', function(event){
        if(event.which == 13){
            CalTotal();
            $('#saleprice').focus();
        }
    });
    $('body').on('keypress', '#saleprice', function(event){
        if(event.which == 13){
            CalTotal();
            $('#carnumber').focus();
        }
    });

    $('body').on('focus blur', '#saleprice, #quantity', function(){
        CalTotal();
    });

    $('body').on('change', '#typeid', function(){
        var value = $(this).val();
        if(value == 1){
            $('#group-date').hide();
        }else{
            $('#group-date').show();
        }
    });
    function GetItemDetail(id, callback) {
        $.ajax({
          url: burl + '/find/itemdetail/' + id,
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

      function CalTotal(){
          var qty = $('#quantity').val();
          if(qty == null || qty == ''){
              qty = 0;
          }
          var price = $('#saleprice').val();
          if(price == null || price == ''){
              price = 0;
          }
          var total = qty * price;
          $('#totalamount').val(total);
      }
})();
