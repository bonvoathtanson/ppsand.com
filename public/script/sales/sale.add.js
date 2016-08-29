(function() {

    SetDeliveryValidation();

    $('body').on('click', '#save', function(){
        SaveOrUpdate();
    });

    var select;
    $('body').on('click', '.transfer', function () {
        select = $(this).closest('tr');
        var id = $(select).attr('data-id');
        $('[name="Id"]').val(id);
        $('#transfermodal').modal({
            backdrop:'static'
        });
    });

    $('#transfermodal').on('hidden.bs.modal', function (e) {
        select = '';
        $('[name="Id"]').val('');
        $('[name="CarNumber"][value=""]').prop('selected', true);
        $('#datetransfer').data("DateTimePicker").date(moment());
    });

    $('#saledate').datetimepicker({
        defaultDate: moment()
    });

    $('#transferdate').datetimepicker({
        defaultDate: moment()
    });

    $('#datetransfer').datetimepicker({
        defaultDate: moment()
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
                            backdrop: 'static'
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
        $('#typeid option[value="0"]').prop('selected', true).change();
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

    $('body').on('focus blur', '#saleprice, #quantity', function(){
        CalTotal();
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

    function SaveTransfer() {
        var id = $('[name="Id"]').val();
        $('body').append(Loading());
        var item = $('#formTransfer').serialize();
        $.ajax({
            type: 'POST',
            url: burl + '/transfer/sale',
            data: item
        }).done(function (data) {
            if (data.IsError == false) {
                $('#transfermodal').modal('hide');
                $(select).remove();
                $('#formTransfer').bootstrapValidator("resetForm", true);
                window.open(burl + '/report/report/'+ id +'','_blank');
            } else {
                swal(data.Message, '', 'warning');
            }
        }).complete(function (data) {
            $('body').find('.loading').remove();
        });
    }

    function SetDeliveryValidation() {
        var form = $('body').find('#formTransfer');
        form.bootstrapValidator({
            feedbackIcons: {
                valid: 'glyphicon glyphicon-ok',
                invalid: 'glyphicon glyphicon-remove',
                validating: 'glyphicon glyphicon-refresh'
            },
            fields: {
                CarNumber: {
                    validators: {
                        notEmpty: {
                            message: 'សូមបញ្ចូលលេខឡាន'
                        }
                    }
                },
                TransferDate: {
                    validators: {
                        notEmpty: {
                            message: 'សូមបញ្ចូលថ្ងៃខែឆ្នាំដឹកចេញ'
                        }
                    }
                }
            }
        }).on('success.form.bv', function (e) {
            SaveTransfer();
        });
        $('body').on('click', '#btnsave', function (e) {
            form.bootstrapValidator('validate');
        });
    }

})();
