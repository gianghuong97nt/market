
'use strict';

$(document).ready(function () {
    initEvents();
});

function initEvents() {

    $(document).on('click', '#insert_data', function () {
        try {
                //lấy cha của đối tượng đang thao tác
                var _this = $(this).closest('.card-body');
                updateProduct(_this);

        } catch (e) {
            alert('update row ' + e.message);
        }
    });

}

function updateProduct(element) {
    try {
        var data = {};
        var _this = element;
        var id         = _this.find('#id').val();
        var name       = _this.find('#name').val();

        data.id = id;
        data.name = name;

        $.ajax({
            type: 'POST',
            url: '/list/update',
            dataType: 'json',  //html
            loading: true,
            data: data,
            ///
            success: function (res) {
                switch (res['status']) {
                    // Success
                    case '200':
                        alert("Thanh cong");
                        location.href = '/list';
                        break;
                    // Data Validate
                    case '201':
                        alert("Loi 201");

                        break;
                    // SQL + PHP Exception
                    case '202':

                        alert("Loi 202");
                        break;
                    default:
                        break;
                }
            },
            // Ajax error
            error: function (res) {
            }
        });
    } catch (e) {
        alert('update' + e.message);
    }

}

