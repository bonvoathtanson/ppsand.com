(function(){
    ViewItem();

    function ViewItem(){
        GetItems(function(incomes){
            RenderTable(incomes, function(element){
                $('#incomeTable tbody').html(element);
            });
        });
    }

    function GetItems(callback) {
        $('body').append(Loading());
        $.ajax({
            url: burl + '/find/income',
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

    function RenderTable(incomes, callback){
        var element = '';
        if((incomes != null) && (incomes.length > 0)){
            $.each(incomes, function(index, item){
                var name = '';
                if(item.customer != null){
                    name = item.customer.CustomerName;
                }
                console.log(item);
                element += '<tr data-id="' + item.Id + '">' +
                                '<td>' + name + '</td>' +
                                '<td>' + item.IncomeDate + '</td>' +
                                '<td class="center">' + item.IncomeType + '</td>' +
                                '<td class="center">' + item.Description + '</td>' +
                                '<td class="center">' + item.TotalAmount + '</td>' +
                                '<td class="center">' +
                                    '<a href="' + burl + '/edit/income/' + item.Id + '" class="btn btn-success btn-e"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a> ' +
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
                url: burl + '/delete/income/' + id,
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
