
'use strict';

$(document).ready(function () {
    initEvents();
});

function initEvents() {
    //add row project member
    $(document).on('click','#btn-add-row-1',function () {
        try {
            var row = $("#main_row_1 tbody tr:first").clone();
            $('#table-data-1 tbody').append(row);
        } catch (e) {
            alert('add new row' + e.message);
        }
    });

    $(document).on('click', '.btn-remove-row-1', function () {
        try {
            var len = $('#table-data-1 tbody tr').length;
            if(len > 1){
                var productid = $(this).attr('productid');
                deleteProduct(productid);
                // $(this).closest('tr').remove();
            }
        } catch (e) {
            alert('remove row ' + e.message);
        }
    });

    $(document).on('click', '.btn-update-row-1', function () {
        try {
            var len = $('#table-data-1 tbody tr').length;
            if(len > 1){
                var productid = $(this).attr('updateproduct');
                updateProduct(productid);
            }
        } catch (e) {
            alert('update row ' + e.message);
        }
    });

}

function deleteProduct(product_id) {
    try {
        var data = {};
        data.product_id = product_id;

        $.ajax({
            type: 'POST',
            url: '/category/del',
            dataType: 'json',  //html
            loading: true,
            data: data,
            ///
            success: function (res) {
                switch (res['status']) {
                    // Success
                    case '200':
                        alert("Thanh cong");
                        location.reload();
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
        alert('save' + e.message);
    }

}


function updateProduct(product_id) {
    try {
        var data = {};
        data.product_id = product_id;
debugger;
        $.ajax({
            type: 'POST',
            url: '/category/upd',
            dataType: 'json',  //html
            loading: true,
            data: data,
            ///
            success: function (res) {
                switch (res['status']) {
                    // Success
                    case '200':
                        alert("Thanh cong");
                        location.reload();
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
