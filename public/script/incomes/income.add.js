(function(){
    $('#incomedate').datetimepicker({
        format: 'YYYY-MM-DD',
        defaultDate: new Date()
    });

    $(':checkbox').iCheck({
        checkboxClass: 'icheckbox_minimal'
    });

    $('body').on('click', '.customer', function(){
        $('#SearchModal').modal({
            backdrop: 'static'
        });
    });
    $('#SearchModal').on('shown.bs.modal', function (e) {
        $('#customer').focus();
    });

    $('#SearchModal').on('hidden.bs.modal', function (e) {
        $('#customer').val('');
    });

    $('body').on('click', '#btnSearch', function(){
        Search();
    });
    $('body').on('keypress', '[name="FilterText"]', function(event){
        if(event.which == 13) {
            Search();
        }
    });

    $('body').on('click','.selected',function(){
        var tr = $(this).closest('tr');
        $('#customername').val($(tr).find('td:eq(1)').text());
        var customerId = $(tr).attr('data-id');
        $('[name="CustomerId"]').val(customerId);
        GetSaleByCustomerId(customerId)
        $('#SearchModal').modal('hide');
    });

    function Search(){
        GetCustomer(function(customers){
            CustomerTable(customers, function(element){
                $('#customerTable tbody').html(element);
            });
        });
    }

    function GetCustomer(callback) {
        $('body').append(Loading());
        var requestUrl = burl + '/filter/customer/' + $('[name="FilterText"]').val();
        $.ajax({
            url: requestUrl,
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

    function CustomerTable(customers, callback){
        var element = '';
        if((customers != null) && (customers.length > 0)){
            $.each(customers, function(index, item){
                element += '<tr data-id="' + item.Id + '" data-address="' + item.Address + '">' +
                '<td>' + item.CustomerCode + '</td>' +
                '<td>' + item.CustomerName + '</td>' +
                '<td class="center">' + item.PhoneNumber + '</td>' +
                '<td class="center">' +
                '<button class="btn btn-info btn-e selected">ជ្រើសរើស</button> ' +
                '</td>'
                '</tr>';
            });
        }
        if(typeof callback == 'function'){
            callback(element);
        }
    }

    function GetSaleByCustomerId(customerId) {
        $('body').append(Loading());
        var requestUrl = burl + '/sale/customer/' + $('[name="FilterText"]').val();
        $.ajax({
            url: requestUrl,
            type: 'GET',
            dataType: 'JSON',
            contentType: 'application/json; charset=utf-8',
        }).done(function (data) {
            if(data.IsError == false){
                if(typeof callback == 'function'){
                    RenderSale(data.Data.Sales);
                }
            }
        }).complete(function (data) {
            $('body').find('.loading').remove();
        });
    }

    function RenderSale(sales) {
        var element = '';
        if((sales != null) && (customers.length > 0)){
            $.each(customers, function(index, item){
                element += '<tr data-id="' + item.Id + '" data-address="' + item.Address + '">' +
                '<td>' + item.CustomerCode + '</td>' +
                '<td>' + item.CustomerName + '</td>' +
                '<td class="center">' + item.PhoneNumber + '</td>' +
                '<td class="center">' +
                '<button class="btn btn-info btn-e selected">ជ្រើសរើស</button> ' +
                '</td>'
                '</tr>';
            });

            return element;
        }
    }
})();
