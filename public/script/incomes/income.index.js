// To do in this file ok?search incomes yes
// 1. Add parameter
// 2. Change route get -> post
// You understand?yes
(function(){

      //---------Section modal search customer-----///
      $('body').on('focus', '#customerName', function(){
          $('#myModal').modal({
              backdrop: false
          });
      });

      $('#myModal').on('shown.bs.modal', function (e) {
          $('#customerNameSearch').focus();
      });

      $('#myModal').on('hidden.bs.modal', function (e) {
          $('#customerNameSearch').val('');
      });

      $('body').on('click', '#btnSearchNameCustomer', function(){
          var value = $('#customerNameSearch').val();
          if(value != '' && value != null){
              Search();
          }else{
              $('.box-null-customer').show();
              $('.box-table').hide();
              $('#customerTable tbody tr').remove();
          }
      });
      $('body').on('keypress', '#customerNameSearch', function(event){
          if(event.which == 13) {
              var value = $('#customerNameSearch').val();
              if(value != '' && value != null){
                  Search();
              }else{
                  $('.box-null-customer').show();
                  $('.box-table').hide();
                  $('#customerTable tbody tr').remove();
              }
          }
      });

      function Search(){
          GetItemsCustomer(function(customers){
              RenderTableCustomer(customers, function(element){
                  if(element != '' && element != null)
                  {
                      $('.box-null-customer').hide();
                      $('.box-table').show();
                  }else{
                      $('.box-null-customer').show();
                      $('.box-table').hide();
                  }
                  $('#customerTable tbody').html(element);
              });
          });
      }

      function GetItemsCustomer(callback) {
          $('body').append(Loading());
          var requestUrl = burl + '/filter/customer/' + $('#customerNameSearch').val();
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

      function RenderTableCustomer(customers, callback){
          var element = '';
          if((customers != null) && (customers.length > 0)){
              $.each(customers, function(index, item){
                  var sex = 'ប្រុស';
                  if(item.Sex == 2){
                      sex = 'ស្រី';
                  }
                  element += '<tr>' +
                                  '<td>' + item.CustomerCode + '</td>' +
                                  '<td>' + item.CustomerName + '</td>' +
                                  '<td class="center">' + item.PhoneNumber + '</td>' +
                                  '<td class="center">' +
                                      '<a data-id="' + item.Id + '" data-name="' + item.CustomerName + '" href="javascript:void(0)" class="btn btn-info btn-e selected">ជ្រើសរើស</a> ' +
                                  '</td>'
                              '</tr>';
              });
          }
          if(typeof callback == 'function'){
              callback(element);
          }
      }

    //---------End modal search customer------//

    //Function On selected customer name
    $('body').on('click','.selected',function(){
        var customerName = $(this).attr('data-name');
        var customerId   = $(this).attr('data-id');
        $('#customerName').val(customerName);
        $('#customerId').val(customerId);
        ViewItem();
        $('#myModal').modal('hide');
    });

    $('#incomeFromDate').datetimepicker({
        format: 'YYYY-MM-DD',
        defaultDate: moment()
    });

    $('#incomeToDate').datetimepicker({
        format: 'YYYY-MM-DD',
        defaultDate: moment()
    });

    //Function click on button search
    $('body').on('click', '#btnsearch', function () {
        var customerId   = $('#customerId').val();
        var incomeFormDate = $('#incomeFromDate').val();
        var incomeToDate   = $('#incomeToDate').val();
        if( customerId !='' || incomeFormDate != '' || incomeToDate != ''){
            ViewItem();
        }else{
            $('.box-null').show();
            $('#incomeTable tbody tr').remove();
        }
     });

     //Function click on button reset
     $('body').on('click', '#btnClear', function () {
         $('#customerId').val('');
         $('#customerName').val('');
           ViewItem();
      });

    ViewItem();

    function ViewItem(){
        GetItems(function(incomes){
            RenderTable(incomes, function(element){
              if(element != '' && element != null)
              {
                  $('.box-null').hide();
              }else{
                  $('.box-null').show();
              }
                $('#incomeTable tbody').html(element);
            });
        });
    }

    function GetItems(callback) {
        $('body').append(Loading());
        var formIncome = $('#formSearchIncome').serialize();
        console.log(formIncome);
        $.ajax({
            url: burl + '/find/income',
            type: 'POST',
            data: formIncome
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
                var type = 'ចំណូលផ្សេងៗ';
                if(item.IncomeType != 0){
                    type = 'ចំណូលកាលក់';
                }
                element += '<tr data-id="' + item.Id + '">' +
                                '<td>' + moment(item.IncomeDate).format('DD-MM-YYYY') + '</td>' +
                                '<td>' + name + '</td>' +
                                '<td class="center">' + item.Description + '</td>' +
                                '<td style="text-align:right;">' + item.TotalAmount + '</td>' +
                                '<td class="center">' +
                                    //'<a href="' + burl + '/edit/income/' + item.Id + '" class="btn btn-success btn-e"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a> ' +
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
