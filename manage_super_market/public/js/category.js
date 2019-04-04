
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
                //lấy cha của đối tượng đang thao tác
                var _this = $(this).closest('tr');
                updateProduct(_this);
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


function updateProduct(element) {
    try {
        var data = {};
        var _this =element;
        var id         = _this.find('.id').val();
        var name       = _this.find('.name').val();
        var image      = _this.find('.image').val();
        var intro      = _this.find('.intro').val();
        var desc       = _this.find('.desc').val();
        var price_core = _this.find('.price_core').val();
        var price_sale = _this.find('.price_sale').val();
        var stock      = _this.find('.stock').val();


        data.product_id = id;
        data.name = name;
        data.image = image;
        data.intro = intro;
        data.desc = desc;
        data.price_core = price_core;
        data.price_sale = price_sale;
        data.stock = stock;

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
