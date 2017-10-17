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