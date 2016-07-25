(function() {

    $('body').on('click', '#save', function(){
        SaveOrUpdate();
    });

    $('body').on('click', '.transfer', function () {
        var select = $(this).closest('tr');
        var id = $(select).attr('data-id');
        swal({
            title: 'ដឹកទំនិញអោយគេ',
            text: 'តើអ្នកពិតជាបានដឹកទំនិញចេញម៉ែនឬទេ?',
            type: 'warning',
            showCancelButton: true,
            confirmButtonText: 'យល់ព្រម',
            cancelButtonText: 'បោះបង់',
            closeOnConfirm: false
        }, function () {
            $('body').append(Loading());
            $.ajax({
                type: 'GET',
                url: burl + '/transfer/sale/' + id,
                dataType: "JSON",
                contentType: 'application/json; charset=utf-8',
            }).done(function (data) {
                if (data.IsError == false) {
                    swal('ទំនិញត្រូវបានដឹកចេញបានជោកជ័យ', '', 'success');
                    $(select).remove();
                } else {
                    swal(data.Message, '', 'success');
                }
            }).complete(function (data) {
                $('body').find('.loading').remove();
            });
        });
    });

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
                        $('#viewqty').text(item.UnitInStock);
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
        $('#itemid, #saleprice, #quantity, #carnumber').val('');
        $('#itemname').text('');
        $('#typeid option[value="1"]').prop('selected', true).change();
        $('#totalamount, #payamount').val('0');
        $('#saledate').data("DateTimePicker").date(new Date());
        $('#transferdate').data("DateTimePicker").date(new Date());
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

    $('body').on('keypress', '#carnumber', function(event){
        if(event.which == 13){
            $('#payamount').focus();
        }
    });

    $('body').on('focus blur', '#saleprice, #quantity', function(){
        CalTotal();
    });

    $('body').on('change', '#typeid', function(){
        var value = $(this).val();
        if(value == 2){
            $('#group-date').hide();
        }else{
            $('#group-date').show();
        }
    });

    function SaveOrUpdate() {
        $('body').append(Loading());
        var item = $('#formSale').serialize();
        $.ajax({
            type: 'POST',
            url: burl + '/insert/sale',
            data: item
        }).done(function (data) {
            if (data.IsError == false) {
                location.reload();
                $('#myModal').modal('hide');
            } else {
                swal(data.Message, '', 'success');
            }
        }).complete(function (data) {
            $('body').find('.loading').remove();
        });
    }

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
