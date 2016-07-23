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
