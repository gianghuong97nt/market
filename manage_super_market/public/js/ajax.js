
// Biến dùng kiểm tra nếu đang gửi ajax thì ko thực hiện gửi thêm
var is_busy = false;

// Biến lưu trữ trang hiện tại
var page = 1;

// Số record trên mỗi trang
var record_per_page = 3;

// Biến lưu trữ trạng thái phân trang
var stopped = false;

$(document).ready(function()
{
    // Khi kéo scroll thì xử lý

    $(document).on('click', '#load_more', function ()
    {
        //alert('abc');
        // Element append nội dung
        $element = $('#table-data-1');

        // ELement hiển thị chữ loadding
        $button = $(this);

        // Nếu đang gửi ajax thì ngưng
        if (is_busy == true) {
            return false;
        }

        // Tăng số trang lên 1
        page++;

        // Hiển thị loadding ...
        $button.html('LOADDING ...');

        // Gửi Ajax
        $.ajax(
            {
                type: 'get',
                dataType: 'json',
                url: 'http://localhost:8003/category',
                data: {page: page},
                success: function(result)
                {
                    var html = '';

                    // Trường hợp hết dữ liệu cho trang kết tiếp
                    if (result.length <= record_per_page)
                    {
                        // Lặp dữ liêụ
                        $.each(result, function (key, obj){
                            html += '<div>'+obj.id+' - '+obj.name+'-'+obj.website+'</div>';
                        });

                        // Thêm dữ liệu vào danh sách
                        $element.append(html);

                        // Xóa button
                        $button.remove();
                    }
                    else{ // Trường hợp còn dữ liệu cho trang kế tiếp
                        // Lặp dữ liêụ, trường hợp này ta lặp bỏ đi phần record cuối cùng vì ta selec với limit + 1
                        $.each(result, function (key, obj){
                            if (key < result.length - 1){
                                html += '<div>'+obj.id+' - '+obj.name+'-'+obj.website+'</div>';
                            }
                        });

                        // Thêm dữ liệu vào danh sách
                        $element.append(html);
                    }

                }
            })
            .always(function()
            {
                // Sau khi thực hiện xong thì đổi giá trị cho button
                $button.html('LOAD MORE');
                is_busy = false;
            });

    });
});