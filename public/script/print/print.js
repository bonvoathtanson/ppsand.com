var Print = function(displayTitle, options, data) {
    var settings = $.extend({
        PageSize: 'container-A4',
        title: displayTitle,
        header: '',
        footer: ''
    }, options);
    var windowprint = window.open('', settings.title,'');
    windowprint.document.write('<html><head><title>'+settings.title+'</title>');
    windowprint.document.write('<style type="text/css">');
    windowprint.document.write('@media screen, print{.no-print,.no-print *{display: none !important;}@page{margin: 0;}@font-face {font-family:KM1;src:url("/css/fonts/khmer M1.volt.ttf") format("truetype");}@font-face {font-family:HAN;src: url("/css/fonts/Hanuman.ttf") format("truetype");}body {background-color: #ddd;font-family:Khmer OS Content;margin: 0;padding: 0;}.container-A4 {background-color: #fff;box-shadow: 0 0 5px #808080;width: 610pt;min-height:70.17em;margin: auto;font-size: 13px!important;padding: 15pt;}.font-HA{font-family:HAN;}.font-M1{font-family:KM1;}.center {text-align: center;}.table {width: 100%;border: 1px solid #000;border-collapse: collapse;}.table>thead>tr>th, .table>tbody>tr>td {border: 1px solid #000;padding: 3px 5px;}.table th {font-size: 13px;text-align: center;}}');
    windowprint.document.write('</style></head>');
    windowprint.document.write('<body><div class ="'+settings.PageSize+'">');
    windowprint.document.write('<div class="center" style="font-size:14pt;font-M1;">ភ្នំពេញខ្សាច់</div>');
    windowprint.document.write('<div class="center" style="font-size:12pt;font-M1">'+settings.title+'</div>');
    windowprint.document.write('<div class="center" style="font-size:11pt;font-HA">អាស័យដ្ឋានៈ វិថីស៊ីសុវិត្ថិ សង្កាត់ស្រះចក ខណ្ឌដូនពេញ រាជធានីភ្នំពេញ</div>');
    windowprint.document.write('<div class="center" style="font-size:11pt;font-HA">លេខទូរស័ព្ទៈ ០១៧​ ៨៦ ៨៨ ៦៧</div>');
    windowprint.document.write('<div class="print-body">');
    windowprint.document.write(data);
    windowprint.document.write('</div></div></body></html>');
    windowprint.document.close();
    windowprint.focus();
    windowprint.print();
    windowprint.close();
};
