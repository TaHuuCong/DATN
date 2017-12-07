// Page-Level Demo Scripts - Tables - Use for reference
$(document).ready(function() {
    $('#dataTables-example').DataTable({
        responsive: true
    });
});

// Thông báo thành công khi thêm, sửa, xóa dữ liệu: sau 1000ms = 1s thì mất đi (cuộn lên) theo kiểu slide up
$('.message.alert').delay(1000).slideUp();

//Thông báo lỗi khi thêm, sửa dữ liệu
$('.error.alert').delay(1000).slideUp();

//Thêm ảnh chi tiết: click vào AddImages thì sẽ thêm vào trong thẻ có #insert những mục chọn file để chọn ảnh chi tiết
$(document).ready(function() {
    $("#addImages").click(function() {
        $("#insert").append('<div class="form-group"><input type="file" name="fProductDetailImage[]" style="margin-bottom: 10px;"></div>');
    });
});

//Xóa hình ảnh chi tiết bằng Ajax
$(document).ready(function() {
    $("a#del_img").on('click', function() {
        var url = "http://localhost:8080/DATN/admin/product/delimg/"; //đường dẫn tới route delimg để trỏ tới hàm getDelImg($id) trong controller
        var _token = $("form[name='formEditProduct']").find("input[name='_token']").val(); //khi tác động đến form cần có _token để bảo mật: trong cái form có tên là formEditProduct, tìm kiếm cái input có tên là _token (xem ở edit.blade.php)
        var urlImage = $(this).parent().find("img").attr("src"); //lấy đường dẫn hình
        var idImage = $(this).parent().find("img").attr("idImage"); //lấy id gốc của hình
        var rid = $(this).parent().find("img").attr("rid"); //lấy số thứ tự của hình trong danh sách hình chi tiết của sản phẩm đó
        $.ajax({
            type: "GET", //phải trùng với phương thức ở route tương ứng
            url: url + idImage, //vì trong route có /{id}
            cache: false,
            data: { //những tham số cần thiết để truyền sang controller
                '_token': _token,
                'urlImage': urlImage,
                'idImage': idImage
            },
            success: function(data) {
                if (data == "Ok") { //chính là "Ok" trong return "OK" ở bên controller
                    $("#" + rid).remove();
                } else {
                    alert("Lỗi xóa hình chi tiết. Vui lòng xem lại!");
                }
            }
        });
    });
});


//Lấy size theo thể loại sản phẩm
$(document).ready(function() {
    $("#pro_id").change(function() {
        var pro_id = $(this).val();
        $.ajax({
            type: 'get',
            dataType: 'html',
            url: URL_GET_SIZE_BY_CATEID,
            data: { pro_id: pro_id },
            success: function(response) {
                if (response == '') {
                    $('#size').prop('disabled', true); //disabled thẻ input trong jquery
                } else {
                    $('#size').prop('disabled', false);
                    $('#size').html(response);
                }
            }
        });
    });
});