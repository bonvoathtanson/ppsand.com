var burl = 'http://localhost/ppsand.com/public';
function Loading() {
  var element = '<div class="loading">' +
                '<i class="fa fa-spinner fa-pulse" style="font-size:60px; position:absolute;top:50%;left:50%;margin:-30px 0 0 -30px;z-index: 9999;color: #000;"></i>' +
                '</div>';
  return element;
}

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
            var a = data.Data.timetransfer;
            var b = data.Data.transfer;
            var c = data.Data.customerask;
            if(a >= 0)
            {
                $('body').find('.badge1').text(a).show();
            }
            if(b >= 0)
            {
                $('body').find('.badge2').text(b).show();
            }
            if(c >= 0)
            {
                $('body').find('.badge3').text(c).show();
            }
        }
    });
}
