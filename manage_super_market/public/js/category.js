
'use strict';

$(document).ready(function () {
    initEvents();
});

function initEvents() {
    //add row project member
    $(document).on('click','#btn-add-row-1',function () {
        try {
            //debugger;
            //var row = $("#main_row_1 tbody tr:first").clone();
            var row = $("#main_row_1 tbody tr").clone();
            // $('#id').attr('value','');
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
    //change_key
    // $(document).on('click', '.pagination-location li a', function () {
    //     try {
    //         var page = $(this).attr('page');
    //         Search(page);
    //     } catch (e) {
    //         alert('.pagination li' + e.message);
    //     }
    // });

    $(document).on('click', '.pagination-location li a', function () {
        try {
            var page = $(this).attr('page');
            //lấy cha của đối tượng đang thao tác
            var _this = $(this).closest('.pagination_product');
            var cat_id = $(_this).attr('catid');
            SearchProduct(page, cat_id);
        } catch (e) {
            alert('.pagination li' + e.message);
        }
    });
}


function deleteProduct(product_id) {
    try {
        var data = {};
        data.product_id = product_id;

        $.ajax({
            type: 'POST',
            url: '/product/delete',
            dataType: 'json',
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
        var _this = element;
        var id         = _this.find('.id').val();
        var cat_id     = _this.find('.cat_id').val();
        var name       = _this.find('.name').val();
        var image      = _this.find('.image').val();
        var intro      = _this.find('.intro').val();
        var desc       = _this.find('.desc').val();
        var price_core = _this.find('.price_core').val();
        var price_sale = _this.find('.price_sale').val();
        var stock      = _this.find('.stock').val();


        data.product_id = id;
        data.cat_id     = cat_id;
        data.name = name;
        data.image = image;
        data.intro = intro;
        data.desc = desc;
        data.price_core = price_core;
        data.price_sale = price_sale;
        data.stock = stock;

        $.ajax({
            type: 'POST',
            url: '/product/update',
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

function Search(page) {
    try {
        var data = {};
        data.page = page;

        $.ajax({
            type: 'GET',
            url: '/category/load',
            dataType: 'html',
            loading: true,
            data: data,

            success: function (res) {
                $("#body_data").empty();
                $("#body_data").html(res);
                //$("#pagination").html(res);
            },
            // Ajax error
            error: function (res) {
            }

        });
    } catch (e) {
        alert('panigation' + e.message);
    }

}
function SearchProduct(page,cat_id) {
    try {
        var data = {};
        data.page = page;
        data.cat_id = cat_id;

        $.ajax({
            type: 'GET',
            url: '/product/load',
            dataType: 'html',
            loading: true,
            data: data,

            success: function (res) {
                //$("#pagination_product").html(res);
                $("#product_data").empty();
                $("#product_data").html(res);
            },
            // Ajax error
            error: function (res) {
                alert('loi');
            }

        });
    } catch (e) {
        alert('pagination' + e.message);
    }

}
