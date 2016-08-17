(function() {
    $('#askdate').datetimepicker({
        format: 'YYYY-MM-DD',
        defaultDate: moment()
    });

    $('#confirmdate').datetimepicker({
        format: 'YYYY-MM-DD',
        defaultDate: moment().add(1, 'days')
    });

    $('#confirmdate').on('dp.change', function (e) {
        $('#askdate').data('DateTimePicker').maxDate(e.date);
    });

    $('#askdate').on('dp.change', function (e) {
        $('#confirmdate').data('DateTimePicker').minDate(e.date);
    });

    SetValidation();
    function SaveOrUpdate() {
        $('body').append(Loading());
        var item = $('#formInfo').serialize();
        $.ajax({
            type: 'POST',
            url: burl + '/insert/customerask',
            data: item
        }).done(function (data) {
            if (data.IsError == false) {
                window.location.href = burl + '/view/askinfo';
            } else {
                swal(data.Message, '', 'success');
            }
        }).complete(function (data) {
            $('body').find('.loading').remove();
        });
    }
    function SetValidation() {
        var form = $('body').find('#formInfo');
        form.bootstrapValidator({
            feedbackIcons: {
                valid: 'glyphicon glyphicon-ok',
                invalid: 'glyphicon glyphicon-remove',
                validating: 'glyphicon glyphicon-refresh'
            },
            fields: {
                AskDate: {
                    validators: {
                        notEmpty: {
                            message: 'សូមធ្វើការបញ្ចូលថ្ងៃសួរព័ត៍មាន'
                        }
                    }
                },
                ConfirmDate: {
                    validators: {
                        notEmpty: {
                            message: 'ឈ្មោះអតិថិជន់ តំរូវអោយបញ្ចូល'
                        }
                    }
                },
                Description: {
                    validators: {
                        notEmpty: {
                            message: 'លេខទូរស័ព្ធ តំរូវអោយបញ្ចូល'
                        }
                    }
                }
            }
        }).on('success.form.bv', function (e) {
            SaveOrUpdate();
        });

        $('body').on('click', '#save', function (e) {
            form.bootstrapValidator('validate');
        });
    }
})();