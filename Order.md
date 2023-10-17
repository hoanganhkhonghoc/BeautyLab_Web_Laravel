// Đặt hàng
// bên site -> đặt hàng
// bên admin -> quản lý đơn

// đơn hàng 
// thông tin đơn hàng
// sản phẩm trong đơn
// trạng thái đơn

// thông tin đơn hàng
// 1. giá đơn (tổng giá trị của đơn hàng)
// 2. thông tin người nhận
// 3. lưu lại làm lịch sử đơn hàng 

// sản phẩm trong đơn 
// nằm trong -> order detail -> 2 khoá chính lẫn 2 khoá phụ -> product id và order id
-> order được tạo trước khi thêm dữ liệu vào order detail

// order thì lại cầm khoá phụ của phương thức thanh toán và thông tin người nhận hàng
-> 2 bảng receiver và payment methods phải được tạo trước

// thông tin người nhận 
// 1. là lấy từ tài khoản đặt hàng 
-> address hày sdt email, tên ,... 
// 2. có thể tạo 1 thông tin mới dựa theo form như thông tin tài khoản 

// trạng thái đơn hàng
// 0 -> đơn đã bị huỷ
// 1 -> đơn chờ xử lý
// 2 -> đơn đang vận chuyển
// 3 -> đơn giao thành công 
// nếu trạng thái đang chờ xử lý -> có thể huỷ bên site còn không khi đã vận chuyển thì không huỷ nữa
// nếu đơn đã bị huỷ -> phía admin sẽ không được khôi phục


// Xoá Cart detail
// Sau khi sử dụng thanh toán sản phẩm thì clear giỏ hàng


// Khi người dùng đặt hàng thì bên admin sẽ phải có popup thông báo
// Đồng nghĩa khi huỷ hàng cũng vậy

// Huỷ đơn 
// việc đầu tiên + lại số lượng sản phẩm trong kho

// huỷ đơn không được khôi phục