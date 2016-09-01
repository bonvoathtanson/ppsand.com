(function(){
    $('.list-group-item:eq(8)').addClass('active');

    $('#expanseFromDate').datetimepicker({
        format: 'YYYY-MM-DD',
        defaultDate: moment()
    });

    $('#expanseToDate').datetimepicker({
        format: 'YYYY-MM-DD',
        defaultDate: moment()
    });

    $("#expanseFromDate").on("dp.change", function (e) {
        $('#expanseToDate').data("DateTimePicker").minDate(e.date);
    });
    $("#expanseToDate").on("dp.change", function (e) {
        $('#expanseFromDate').data("DateTimePicker").maxDate(e.date);
    });

    ViewItem();

    function ViewItem(){
        GetItems(function(expanses){
            RenderTable(expanses, function(element){
                $('#expanseTable tbody').html(element);
            });
        });
    }
    //Function click on button search
    $('body').on('click', '#btnsearch', function () {
        var expansesFormDate = $('#expanseFormDate').val();
        var expansesToDate   = $('#expanseToDate').val();
        if( expansesFormDate != '' || expansesToDate != ''){
            ViewItem();
        }else{
            $('.box-null').show();
            $('#expanseTable tbody tr').remove();
        }
    });

    function GetItems(callback) {
        $('body').append(Loading());
        var formData = $('#formSearchExpanse').serialize();
        $.ajax({
            url: burl + '/find/expanse',
            type: 'POST',
            data: formData
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

    function RenderTable(expanses, callback){
        var element = '';
        if((expanses != null) && (expanses.length > 0)){
            $.each(expanses, function(index, item){
                var name = '';
                if(item.supplier != null){
                    name = item.supplier.SupplierName;
                }
                var type = 'ចំណាយផ្សេងៗ';
                if(item.ExpanseType == 1){
                    type = 'ចំណាយការទិញ';
                }
                element += '<tr data-id="' + item.Id + '">' +
                                // '<td>' + name + '</td>' +
                                '<td>' + moment(item.ExpanseDate).format('DD-MM-YYYY') + '</td>' +
                                '<td class="center">' + type + '</td>' +
                                '<td>' + item.Description + '</td>' +
                                '<td style="text-align:right;">' + item.TotalAmount + '</td>' +
                                '<td class="center">' +
                                    //'<a href="' + burl + '/edit/expanse/' + item.Id + '" class="btn btn-success btn-e"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a> ' +
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
                url: burl + '/delete/expanse/' + id,
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
