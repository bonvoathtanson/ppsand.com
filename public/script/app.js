var burl = 'http://localhost/ppsand.com/public';
$('.no-report').addClass('show');
$('.report').addClass('hide');
function Loading() {
  var element = '<div class="loading">' +
                '<i class="fa fa-spinner fa-pulse" style="font-size:60px; position:absolute;top:50%;left:50%;margin:-30px 0 0 -30px;z-index: 9999;color: #000;"></i>' +
                '</div>';
  return element;
}
var i = true;
$('body').on('click', '.navbar-brand', function(){
    if(i == true){
        $('.box-left').css('left', '-250px');
        $('.box-right').css('margin-left', '0');
        i = false;
    }else{
        $('.box-left').css('left', '0');
        $('.box-right').css('margin-left', '250px');
        i = true;
    }
});

function CDate(datetime){
    var ret = '';
    ret = moment(datetime).format('DD-MM-YYYY HH:mm');
    if(ret == 'Invalided'){
        ret = '';
    }
    return ret;
}
Notification();
function Notification()
{
    $.ajax({
        url: burl + '/notification',
        type: 'GET',
        dataType: 'JSON',
        contentType: 'application/json; charset=utf-8',
    }).done(function (data) {
        if(data.IsError == false){
            var timeTransfer = data.Data.timetransfer;
            var transfer = data.Data.transfer;
            var customerAsk = data.Data.customerask;
            var item =  data.Data.item;
            if(timeTransfer > 0)
            {
                $('body').find('.badge1').text(timeTransfer).show();
            }
            if(transfer > 0)
            {
                $('body').find('.badge2').text(transfer).show();
            }
            if(customerAsk > 0)
            {
                $('body').find('.badge3').text(customerAsk).show();
            }
            if(item > 0)
            {
                $('body').find('.badge4').text(item).show();
            }
        }
    });
}
