(function(){
    ViewItem();

    function ViewItem(){
        GetItems(function(customers){
            RenderTable(customers, function(element){
                $('#saleTable tbody').html(element);
            });
        });
    }

    function GetItems(callback) {
        $('body').append(Loading());
        $.ajax({
            url: burl + '/find/sale',
            type: 'GET',
            dataType: 'JSON',
            contentType: 'application/json; charset=utf-8',
        }).done(function (data) {
            console.log(data);
            if(data.IsError == false){
                if(typeof callback == 'function'){
                    callback(data.Data);
                }
            }
        }).complete(function (data) {
            $('body').find('.loading').remove();
        });
    }

    function RenderTable(customers, callback){
        var element = '';
        if((customers != null) && (customers.length > 0)){
            $.each(customers, function(index, item){
                var disedit = 'disabled';
                var disdel = 'disabled="disabled"';
                var rowcolor = '';
                var remain = (item.SubTotal-item.PayAmount);
                if(item.IsOrder == 1)
                {
                    rowcolor = 'info';
                    if(item.PayAmount == 0)
                    {
                        disedit = '';
                        disdel = '';
                    }
                }else if(remain == 0){
                    rowcolor = 'success';
                }
                element += '<tr class="' + rowcolor + '" data-id="' + item.Id + '">' +
                                '<td><a href="'+ burl +'/create/sale/'+ item.customer.Id +'">' + item.customer.CustomerName + '</a></td>' +
                                '<td>' + item.item.ItemName + '</td>' +
                                '<td class="center">' + CDate(item.SaleDate) + '</td>' +
                                '<td class="center">' + item.CarNumber + '</td>' +
                                '<td class="center">' + item.Quantity + '</td>' +
                                '<td class="center">' + item.SalePrice + '</td>' +
                                '<td class="center" style="text-align:right;">' + item.SubTotal + '</td>' +
                                '<td class="center" style="text-align:right;">' + item.PayAmount + '</td>' +
                                '<td class="center" style="text-align:right;">' + remain + '</td>' +
                                '<td class="center">' +
                                    '<button type="button" class="btn btn-danger btn-e delete" ' + disdel + '><i class="fa fa-trash-o" aria-hidden="true"></i></button>' +
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
                url: burl + '/delete/sale/' + id,
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